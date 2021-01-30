<?php

abstract class Model {
    private static $db_host = 'srv9.cpanelhost.cl';
    private static $db_user = 'chq18575_keyzen';
    private static $db_pass = 'elmasmejor';
    private static $db_charset = 'utf8';

    protected $db_name;
    protected $rows = array();
    protected $query;
    protected $conn;


    abstract protected function create();
    abstract protected function read();
    abstract protected function update();
    abstract protected function delete();
    abstract protected function changeCategory();
    
    private function db_open(){
        $this->conn = new mysqli (
            self::$db_host,
            self::$db_user,
            self::$db_pass,
            $this->db_name
        );

        $this->conn->set_charset(self::$db_charset);
        
        return $this->conn;
    }

    private function db_close(){
        $this->conn->close();
    }

    protected function get_data(){

        $this->db_open();

        $result = $this->conn->query($this->query);

        while($this->rows[] = $result->fetch_assoc());

        $result->close();

        $this->db_close();

        return array_pop($this->rows);

    }

    protected function set_data(){

        $this->db_open();

        $this->conn->query($this->query);

        $this->db_close();

    }


}