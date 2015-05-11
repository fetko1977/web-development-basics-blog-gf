<?php

namespace Admin\Controllers;

class Post_Controller extends \Admin\Controllers\Admin_Controller {
    
    public function __construct() {
        parent::__construct( get_class(), 'post', '/views/admin/post/' );
    }
    
    public function index(){
        $current_user = $this->logged_user;
        $current_user_id = $current_user['id'];
        
        $posts = $this->model->get_posts_by_current_user( $current_user_id );
        $template_name = ROOT_DIR . $this->views_dir . 'index.php';
        include_once ROOT_DIR . '/views/layout/' . $this->layout;
    }
    
    public function view( $id ){
        $post = $this->model->get_posts_by_id( $id );
        $post_comments = $this->model->get_posts_comments_by_id( $id );
        
        $template_name = ROOT_DIR . $this->views_dir . 'single-post.php';
        include_once ROOT_DIR . '/views/layout/' . $this->layout;
    }
    
    public function add(){
        if ( ! empty( $_POST['title']) && ! empty( $_POST['content'] ) ) {
            $title = $_POST['title'];
            $content = $_POST['content'];
            $date = date("Y-m-d H:i:s");
            $author_id = $this->logged_user['id'];
            
            $post = array(
                'title' => $title,
                'content' => $content,
                'date' => $date,
                'User_id' => $author_id
            );
            
            if($this->model->add_new_post( $post ) > 0){
                header( 'Location: ' . ROOT_URL . 'admin/post/index/');
            } else {
                echo "<p style='text-align: center;'>Your post was not added!</p>";
            }
            
        }
        $template_name = ROOT_DIR . $this->views_dir . 'add-post.php';
        include_once ROOT_DIR . '/views/layout/' . $this->layout;
    }
    
    public function edit ( $id ){
        $post = $this->model->get_posts_by_id( $id )[0];
        
        if ( ! empty( $_POST['title']) && ! empty( $_POST['content'] ) ) {
            $id = $post['id'];
            $title = $_POST['title'];
            $content = $_POST['content'];
            $date = date("Y-m-d H:i:s");
            $author_id = $this->logged_user['id'];
            
            $post = array(
                'id' => $id,
                'title' => $title,
                'content' => $content,
                'date' => $date,
                'User_id' => $author_id
            );
            
            if($this->model->edit_post( $post ) > 0){
                header( 'Location: ' . ROOT_URL . 'admin/post/view/' . $id );
            } else {
                echo "<p style='text-align: center;'>Your post was not added!</p>";
            }
            
        }
        $template_name = ROOT_DIR . $this->views_dir . 'edit-post.php';
        include_once ROOT_DIR . '/views/layout/' . $this->layout;
    }
    
    public function delete ( $id ){
        
        if($this->model->delete_post( $id ) > 0){
            header( 'Location: ' . ROOT_URL . 'admin/post/index/');
        } else {
            echo "<p style='text-align: center;'>Your post was not delted!</p>";
        }
        
        $template_name = ROOT_DIR . $this->views_dir . 'single-post.php';
        include_once ROOT_DIR . '/views/layout/' . $this->layout;
    }
}
