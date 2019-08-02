<?php
namespace Config;

class Response {

    private $_success;
    private $_httpStatusCode;
    private $_data;
    private $_messages = array();

    private $_toCache = false;
    private $_responseData = array();
    private $_response;

    public function __construct($response)
    {
        $this->_response = $response;
    }

    public function setSuccess($success){
        $this->_success = $success;
    }


    public function setHttpStatusCode($httpStatusCode){
        $this->_httpStatusCode = $httpStatusCode;
    }


    public function addMessage($message){
        $this->_messages[] = $message;
    }

    public function setData($data){
        $this->_data = $data;
    }

    public function toCache($toCache){
        $this->_toCache = $toCache;
    }


    public function getResponse(){
        $this->_responseData['statusCode'] = $this->_httpStatusCode;
        $this->_responseData['success'] = $this->_success;
        $this->_responseData['messages'] = $this->_messages;
        $this->_responseData['data'] = $this->_data;

        return $this->_response->withStatus($this->_httpStatusCode)->withJson($this->_responseData);
    }

}