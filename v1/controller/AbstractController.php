<?php
namespace Controller;

abstract class AbstractController {

    protected $db_write;
    protected $db_read;
    protected $log;

    public function  __construct( $dbWrite,  $dbRead, $log)
    {
        $this->db_write = $dbWrite;
        $this->db_read  = $dbRead;
        $this->log = $log;
    }
}