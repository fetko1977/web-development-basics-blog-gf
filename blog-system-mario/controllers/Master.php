<?php

namespace Controllers;

class Master_Controller {
    protected $layout;
    
    protected $views_dir;


    public function __construct( $class_name = '\Controllers\Master_Controller',
            $model = 'master',
            $views_dir = '/views/master/' ) {
        $this->views_dir = $views_dir;
        $this->class_name = $class_name;
        
        include_once ROOT_DIR . "/models/{$model}.php";
        
        $model_class = "\Models\\" . ucfirst( $model ) . "_Model";
        
        $this->model = new $model_class ( array( 'table' => 'none' ) );
        $this->layout = ROOT_DIR . '/views/layout/default.php';
    }
}
