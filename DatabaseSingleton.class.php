<?php

class DatabaseSingleton
{
    private static $instance;

    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new DatabaseSingleton();
        }

        return self::$instance;
    }

    private function __construct()
    {
        $host = 'localhost';
        $dbUser = 'root';
        $dbPass = 'root';
        $dbname = 'phpcamp';

        $this->db = new mysqli($host, $dbUser, $dbPass, $dbname);

        if ($this->db->connect_error) {
            // blad polaczenia
            var_dump($this->db->connect_error);
            die;
        }
    }

    private $db;

    public function getRow($query)
    {
        $result = $this->db->query($query);
        if ($result) {
            $return = $result->fetch_assoc();
            if ($return === null) {
                return [];
            } else {
                return $return;
            }
        } else {
            return [];
        }
    }

    public function getRows($query)
    {
        $result = $this->db->query($query);
        if ($result) {
            $rows = [];
            while (($row = $result->fetch_assoc())) {
                $rows[] = $row;
            }
            return $rows;
        } else {
            return [];
        }
    }

    public function query($query)
    {
        $result = $this->db->query($query);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function getError()
    {
        return $this->db->error;
    }

    public function getErrorsList()
    {
        return $this->db->error_list;
    }

    public function __destruct()
    {
        $this->db->close();
    }
}