<?php

namespace Controllers;

class Tag_Controller extends Master_Controller {
    
    public function __construct() {
        parent::__construct( get_class(), 'tag', '/views/tag/' );
    }
    
    public function index(){
        $posts = $this->model->get_tags();
        
        $template_name = ROOT_DIR . $this->views_dir . 'index.php';
        include_once ROOT_DIR . '/views/layout/' . $this->layout;
    }
}
