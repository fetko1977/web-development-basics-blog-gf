<?php

namespace Lib;

class Database {
    
    private static $_db = null;
    
    private function __construct() {
        $host = DB_HOST;
        $username = DB_USER;
        $password = DB_PASS;
        $dbname = DB_NAME;
        
        $db = new \mysqli($host, $username, $password, $dbname);
        
        if($db->connect_error) {
            die("$db->connect_errno: $db->connect_error");
        }
        
        self::$_db = $db;
    }
    
    public static function get_instance(){
        static $instance = null;
        
        if ($instance == null) {
            $instance = new static();
        }
        
        return $instance;
    }
    
    public static function get_db(){
        return self::$_db;
    }
}

