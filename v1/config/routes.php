<?php

use Controller\ControllerFactory;
use Swagger\Swagger;

$factory = new ControllerFactory($db_write , $db_read, $log);
$controller = $factory->getInstance('test');


$app->get('/v1/', function ($request, $response, $args) use($controller) {
    return $controller->select($request, $response, $args);
});




