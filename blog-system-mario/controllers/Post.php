<?php

namespace Controllers;

class Post_Controller extends Master_Controller {
    
    public function __construct() {
        parent::__construct( get_class(), 'post', '/views/post/' );
    }
    
    public function index(){
        $posts = $this->model->get_all_posts_with_authors();
        
        $template_name = ROOT_DIR . $this->views_dir . 'index.php';
        include_once ROOT_DIR . '/views/layout/' . $this->layout;
    }
    
    public function view( $id ){
        $post = $this->model->get_posts_by_id( $id );
        
        $template_name = ROOT_DIR . $this->views_dir . 'single-post.php';
        include_once ROOT_DIR . '/views/layout/' . $this->layout;
    }
}
