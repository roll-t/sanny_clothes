<?php
class DB{
    public $db;
    function __construct()
    {
        $connect= new Connect();
        $this->db= $connect->dataConnect;
    }
}