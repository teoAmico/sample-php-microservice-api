<?php

namespace Controller;

use \Model\HostException;
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use \Config\Response as fmtResponse;
use \Model\Host as TestModel;


/**
 * @OA\Info(title="Test API", version="0.1")
 */
class Test extends AbstractController
{

    /**
     * @OA\Get(
     *     path="/v1/test",
     *     description="test api",
     *     @OA\Response(response="default", description="Welcome page")
     * )
     */
    public function select(Request $request, Response $response, $args)
    {

        
            $fmt_response = new fmtResponse($response);
            $fmt_response->setSuccess(true);
            $fmt_response->setHttpStatusCode(200);
            return $fmt_response->getResponse();

        


    }
    

}

