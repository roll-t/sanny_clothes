<?php
class Model{
    private $_data=null;

    public $db=null;
    public function __construct()
    {
        $this->_data= new Connect();
        $this->db=$this->_data->dataConnect;
    }

    function getAll($table=''){
        if(!empty($table)){
            $sql='SELECT * FROM '.$table.' ';
            $value = $this->db->query($sql)->fetch_all();
            return $value;
        }else{
            return false;
        }
    }
    function getWhere($table="",$field='',$compare='',$number=""){
        if(!empty($table) && !empty($field) && !empty($compare) && !empty($number)){
            $sql='SELECT * FROM '.$table.' WHERE '.$field.$compare.$number.'';
            $value=$this->db->query($sql)->fetch_all();
            return $value;
        }else{
            return false;
        }
    }

}