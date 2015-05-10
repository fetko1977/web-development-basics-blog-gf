<?php

namespace Admin\Controllers;

class Admin_Controller extends \Controllers\Master_Controller {
    protected $auth;
    
    public function __construct() {
		parent::__construct( get_class(), 'master', '/views/admin/' );
		$auth = \Lib\Auth::get_instance();
                $this->auth = $auth;
		
                $logged_in = $auth->is_logged_in();
                $this->is_logged_in = $logged_in;
                
		if( ! $this->is_logged_in() ) {
			header( 'Location: ' . ROOT_URL);
			exit();
		}
	}
    
    public function index(){
        $user_id = $this->auth->get_logged_user()['id'];
        $user = $this->model->get_user_by_id( $user_id );
        
        $template_name = ROOT_DIR . $this->views_dir . 'index.php';
        
        include_once ROOT_DIR . '/views/layout/' . $this->layout;
    }
    
    public function is_logged_in(){
        return $this->is_logged_in;
    }
}
