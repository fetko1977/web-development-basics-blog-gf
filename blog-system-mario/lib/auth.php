<?php

namespace Lib;

class Auth {
    private static $_is_logged_in;
    private static $_logged_user = array();
    
    private function __construct() {
        session_set_cookie_params(1800, '/');
        session_start();
        
        if( !empty( $_SESSION['username'] ) ){
            self::$_is_logged_in = true;
            self::$_logged_user = array (
                'id' => $_SESSION['user_id'],
                'username' => $_SESSION['username']
            );
        }
    }
    
    public static function get_instance() {
        static $instance = null;
        
        if ($instance === null) {
            $instance = new static();
        }
        
        return $instance;
    }
    
    public function is_logged_in() {
        return self::$_is_logged_in;
    }
    
    public function get_logged_user() {
        return self::$_logged_user;
    }
    
    public function register( $user ){
        $db_object = \Lib\Database::get_instance();
        $db = $db_object->get_db();
        
        $keys = array_keys( $user );
        $values = array();
        
        foreach ( $user as $key => $value ){
            if($key === 'password'){
                $value = md5($value);
            }
            $values[] = "'" . $db->real_escape_string( $value ) . "'"; 
        }
        
        $keys = implode( $keys, ', ' );
        $values = implode( $values, ', ' );
        
        $query = "INSERT INTO users ($keys) values($values)";
        
        if(!$statement = $db->prepare($query)){
            print "Failed to prepare statement\n";
        } else {
            $statement->execute();
            
            $db->query( $query );
        
            return $db->affected_rows;
        }
    }


    public function login( $username, $password ){
        $db = \Lib\Database::get_instance();
        $dbconn = $db->get_db();
		
		
        $statement = $dbconn->prepare( "SELECT id FROM users WHERE username = ? AND password = MD5( ? ) LIMIT 1" );
        
        $statement->bind_param( 'ss', $username, $password );

        $statement->execute();
        
        $statement->bind_result( $id );
        
        
        while ($statement->fetch()){
            $_SESSION['username'] = $username;
            $_SESSION['user_id'] = $id;
        }
            
        if( $_SESSION['username'] == null ||  $_SESSION['user_id'] == null) {
            return false;
        } else {
            return true;
        }    

        
    }
    
    public function logout(){
        session_destroy();
    }
}

