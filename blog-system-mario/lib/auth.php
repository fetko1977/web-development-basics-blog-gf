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
    
    public function login( $username, $password ){
        $db_object = \Lib\Database::get_instance();
        $db = $db_object->get_db();
        
        $statement = $db->prepare("SELECT id FROM users WHERE username = ? AND password = MD5( ? ) LIMIT 1");
        
        $statement->bind_param( 'ss', $username, $password );
		
        $statement->execute();
		
        $result_set = $statement->get_result();
		
        if ( $row = $result_set->fetch_assoc() ) {
            $_SESSION['username'] = $username;
            $_SESSION['user_id'] = $row['id'];
            
            return true;
        }
        
        return false;
    }
    
    public function logout(){
        session_destroy();
    }
}

