<?php

namespace Admin\Controllers;

class Admin_Controller extends \Controllers\Master_Controller {
    public function __construct() {
		parent::__construct( get_class(), 'master', '/views/admin/' );
		
		$logged_in = \Lib\Auth::get_instance()->is_logged_in();
                
		if( ! $logged_in ) {
			header( 'Location: ' . ROOT_URL);
			exit();
		}
	}
    
    public function index(){
        $template_name = ROOT_DIR . $this->views_dir . 'index.php';
        
        include_once ROOT_DIR . '/views/layout/' . $this->layout;
    }
}
