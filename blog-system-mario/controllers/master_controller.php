<?php

namespace Controllers;

class Master_Controller {
        protected $layout = 'default.php';
	protected $views_dir =  '/views/master/';
	protected $model = null;
	protected $class_name = null;
	protected $logged_user = array();
	public function __construct( $class_name = '\Controllers\Master_Controller', $model = 'master', $views_dir = '/views/master/' ) {
		
		$this->class_name = $class_name;
		
		$this->model = $model;
		$this->views_dir = $views_dir;
		
		include_once ROOT_DIR . "models/{$model}.php";
		$model_class = "\Models\\" . ucfirst( $model ) . "_Model";  
		
		$this->model = new $model_class( array( 'table' => 'none' ) );
		
		$logged_user = \Lib\Auth::get_instance()->get_logged_user();
		$this->logged_user = $logged_user;
	}
	
	public function index() {
            $template_name = ROOT_DIR . $this->views_dir . 'index.php';

            include_once ROOT_DIR . '/views/layout/' . $this->layout;
	}
}
