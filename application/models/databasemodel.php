<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Databasemodel extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    function dbQuery($sql){
        return $this->db->query($sql);
    }

    function insertQuery($table, $array, $batch = false){
        date_default_timezone_set("Asia/Manila");
        if(count($array) > 0){
            if(!$batch)
                $this->db->insert($table, $array);
            else
                $this->db->insert_batch($table, $array);

            return $this->db->insert_id();
        }
    }

    function getResultArray($table, $fields = array(), $where=1, $join='', $orderby='',$trace=false){
        if($orderby!='')
            $orderby = 'ORDER BY '.$orderby;

        $sql = "SELECT ".$fields." FROM ".$table." ".$join." WHERE ".$where." ".$orderby;
        if($trace==true)
            echo $sql;

        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function getSingleResult($table, $fields = array(), $where=1, $join='', $trace=FALSE){
        $sql = "SELECT ".$fields." FROM ".$table." ".$join." WHERE ".$where." LIMIT 1";
        if($trace == true)
            echo $sql;

        $query = $this->db->query($sql);
        $result = '';
        foreach($query->result_array() AS $key => $value){
            $result = $value;
        }
        return $result;
    }

    function getSingleColumnResult($table, $field, $where=1, $orderby='', $trace=FALSE){
        if($orderby != '') $orderby = 'ORDER BY '.$orderby;
        $sql = "SELECT ".$field." FROM ".$table." WHERE ".$where." ".$orderby;
        if($trace == TRUE) echo $sql;

        $result = [];
        $query = $this->db->query($sql);
        foreach($query->result_array() AS $key => $value){
            array_push($result, $value[$field]);
        }
        return $result;
    }

    function getQueryResults($table, $fields, $where=1, $join='', $orderby='', $trace=false){
        if($orderby!='') $orderby = 'ORDER BY '.$orderby;
        $sql = "SELECT ".$fields." FROM ".$table." ".$join." WHERE ".$where." ".$orderby;
        if($trace == true) echo $sql;

        $query = $this->db->query($sql);
        return $query->result();
    }

    function updateQuery($table, $where = array(), $data = array(), $trace=FALSE){
      var_dump($data);
        $this->db->where($where);
        $this->db->update($table, $data);
    }
}

?>
