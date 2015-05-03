<?php

namespace Controllers;

class Master_Controller {
    protected $layout;
    
    protected $views_dir;


    public function __construct( $views_dir = '/views/master/' ) {
        $this->views_dir = $views_dir;
        $this->layout = CURRENT_FILE_ROOT_DIR . '/views/layout/default.php';
    }
}
