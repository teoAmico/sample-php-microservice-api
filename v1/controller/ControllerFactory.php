<?php

namespace Controller;

    use Controller\Test;


class ControllerFactory extends AbstractControllerFactory {

    public function getInstance($param)
    {
        switch (strtolower($param)){
            case 'test':
                return $this->getTestController();
            default:
                return null;

        }
    }

    protected function getTestController(){
        $controller = new Test($this->db_write,$this->db_read, $this->log);
        return $controller;
    }

}
