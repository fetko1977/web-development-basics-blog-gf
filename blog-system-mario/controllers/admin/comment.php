<?php

namespace Admin\Controllers;

class Comment_Controller extends \Admin\Controllers\Admin_Controller {
    
    public function __construct() {
        parent::__construct( get_class(), 'comment', '/views/admin/comment/' );
    }
    
    public function view( $id ){
        //$post = $this->model->get_posts_by_id( $id );
        //$post_comments = $this->model->get_posts_comments_by_id( $id );
        
        $template_name = ROOT_DIR . $this->views_dir . 'single-comment.php';
        include_once ROOT_DIR . '/views/layout/' . $this->layout;
    }
    
    public function edit ( $id ){
        
        $template_name = ROOT_DIR . $this->views_dir . 'edit-post.php';
        include_once ROOT_DIR . '/views/layout/' . $this->layout;
    }
    
    public function delete_comment_by_id ( $id ){
        if($this->model->delete_post( $id ) > 0){
            header( 'Location: ' . ROOT_URL . 'admin/post/index/');
        } else {
            echo "<p style='text-align: center;'>Your post was not delted!</p>";
        }
        
        $template_name = ROOT_DIR . $this->views_dir . 'single-post.php';
        include_once ROOT_DIR . '/views/layout/' . $this->layout;
    }
}
