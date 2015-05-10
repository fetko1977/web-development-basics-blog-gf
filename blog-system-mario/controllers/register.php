<?php

namespace Controllers;

class Register_Controller extends Master_Controller {
    private $_is_unique_register_username = false;
    
    public function __construct() {
        parent::__construct( get_class(), 'master', '/views/register/' );
    }
    
    public function index(){
        $auth = \Lib\Auth::get_instance();
        
        
        if ( $_SERVER['REQUEST_METHOD'] == 'POST' && ! empty( $_POST['username'] ) && 
            ! empty( $_POST['password'] ) && ! empty( $_POST['password-again'] ) &&
            ! empty( $_POST['firstname'] ) && ! empty( $_POST['lastname'] )) {
            
            $username = trim($_POST['username']);
            $password = trim($_POST['password']);
            $password_again = trim($_POST['password-again']);
            $firstname = trim($_POST['firstname']);
            $lastname = trim($_POST['lastname']);
            
            $db_username_value = $this->model->get_user_by_username( $username );
            
            if ($username != $db_username_value) {
                $this->_is_unique_register_username = true;
            }
            
            $user = array(
                'username' => $username,
                'password' => $password,
                'firstname' => $firstname,
                'lastname' => $lastname
                );
            
            
            if($password != $password_again){
                echo "<div class='container' style='text-align: center;'><p>Password must be the same!</p></div>";
            } else if( $this->_is_unique_register_username == false ) {
                echo "<div class='container' style='text-align: center;'><p>Username already exists in the database!</p></div>";
            } else {
                $register = $auth->register($user);
                if ($register) {
                    header( 'Location: ' . ROOT_URL . 'login/index/?success=register');
                }
                
            }
        } else {
            echo "<div class='container' style='text-align: center;'><p>All fields are required!</p></div>";
        }
        
        
        
        $template_name = ROOT_DIR . $this->views_dir . 'index.php';
        
        include_once ROOT_DIR . '/views/layout/' . $this->layout;
    }
}

