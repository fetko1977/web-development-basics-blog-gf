<?php

namespace Controllers;

class Login_Controller extends Master_Controller {
    
    public function __construct() {
        parent::__construct( get_class(), 'master', '/views/login/' );
    }
    
    public function index(){
        $auth = \Lib\Auth::get_instance();
        
        if ( ! empty( $_POST['username'] ) && ! empty( $_POST['password'] )) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            
            $is_logged_in = $auth->login($username, $password);
            header('Location: ' . ROOT_URL . 'admin/admin/');
        }
        
        $template_name = ROOT_DIR . $this->views_dir . 'index.php';
        
        include_once ROOT_DIR . '/views/layout/' . $this->layout;
    }
    
    public function logout(){
        $auth = \Lib\Auth::get_instance();
		
	$auth->logout();
		
	header( 'Location: ' . ROOT_URL);
	exit();
    }
}