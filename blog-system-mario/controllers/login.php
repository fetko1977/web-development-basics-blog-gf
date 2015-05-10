<?php

namespace Controllers;

class Login_Controller extends Master_Controller {
    
    public function __construct() {
        parent::__construct( get_class(), 'master', '/views/login/' );
    }
    
    public function index(){
        $auth = \Lib\Auth::get_instance();
        $user = $auth->get_logged_user();
        
        if ( empty( $user ) && ! empty ( $_POST['username'] ) && ! empty ( $_POST['password'] )) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            
            $is_logged_in = $auth->login($username, $password);
            
            if( $is_logged_in == true ){
                header('Location: ' . ROOT_URL . 'admin/admin/');
            } else {
                echo "<div class='container' style='text-align: center;'><p>Login was not successfull. Please try again.</p></div>";
            }
        } else if (! empty( $user )){
            header('Location: ' . ROOT_URL . 'admin/admin/');
        } else {
            echo "<div class='container' style='text-align: center;'><p>Username and Password are required.</p></div>"; 
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