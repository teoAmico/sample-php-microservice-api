<?php

namespace Model;


class Test {

    private $_test_id;


    public function __construct($id)
    {
        $this->setTestId($id);


    }

    public function getTestId(){
        return $this->_test_id;
    }

    public function setTestId($id){
        if(!empty($id) && is_numeric($id)){
            $this->_test_id = $id;
        }

    }

    public function returnTestArray(){
        $test = [];
        $test['test_id'] = $this->getTestId();
       

        return $test;
    }
}
