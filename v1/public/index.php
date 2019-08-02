<?php



require '../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::create(__DIR__ . '/..');
$dotenv->load();

use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use \Config\Response as fmtResponse;

$log = new Logger('app');
$log->pushHandler(new StreamHandler('../logs/error.log', Logger::ERROR));


use Config\Database;

try{
    $db_write = Database::connectWriteDB();
    $db_read = Database::connectReadDB();
}catch (PDOException $e){
   $log->error($e->getMessage());
}

$c = new \Slim\Container();


$c['notFoundHandler'] = function ($c) {
    return function ($request, $response) use ($c) {
        $fmt_response = new fmtResponse($response);
        $fmt_response->setSuccess(false);
        $fmt_response->setHttpStatusCode(404);
        $fmt_response->addMessage('Page not found');
        return $fmt_response->getResponse();
    };
};
$c['notAllowedHandler'] = function ($c) {
    return function ($request, $response, $methods) use ($c) {
        $fmt_response = new fmtResponse($response);
        $fmt_response->setSuccess(false);
        $fmt_response->setHttpStatusCode(405);
        $fmt_response->addMessage('Method must be one of: ' . implode(', ', $methods));
        return $fmt_response->getResponse();
    };
};
$c['phpErrorHandler'] = function ($c) {
    return function ($request, $response, $error) use ($c) {
        $fmt_response = new fmtResponse($response);
        $fmt_response->setSuccess(false);
        $fmt_response->setHttpStatusCode(500);
        $fmt_response->addMessage('Something went wrong!');
        return $fmt_response->getResponse();
    };
};

$app = new \Slim\App($c);

require_once("../config/routes.php");

$app->run();