<?php

namespace Controllers;

class Post_Controller extends Master_Controller {
    
    public function __construct() {
        parent::__construct( '/views/post/' );
    }
    
    public function index(){
        $template_name = CURRENT_FILE_ROOT_DIR . $this->views_dir . 'index.php';
        include_once $this->layout;
    }
}
