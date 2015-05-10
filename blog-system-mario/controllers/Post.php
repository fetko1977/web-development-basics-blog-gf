<?php

namespace Controllers;

class Post_Controller extends Master_Controller {
    protected $posts_views_counter = 0;
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
        $this->posts_views_counter ++;
        //$counter = $this->posts_views_counter;
        $post_comments = $this->model->get_posts_comments_by_id( $id );
        
        //Comment submit here
        if ( ! empty( $_POST['firstname']) && ! empty( $_POST['lastname'] )  && ! empty( $_POST['content'] )) {
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $content = $_POST['content'];
            ! empty( $_POST['email'] ) ? $email = $_POST['email'] : $email = null;
            $date = date("Y-m-d H:i:s");
            
            $comment = array(
                'firstname' => $firstname,
                'lastname' => $lastname,
                'content' => $content,
                'email' => $email,
                'date' => $date,
                'Post_id' => $id
            );
            
            if($this->model->add_post_comment( $table, $comment ) > 0){
                echo "<p style='text-align: center;'>You comment is added!</p>";
                $post_comments = $this->model->get_posts_comments_by_id( $id );
            } else {
                echo "<p style='text-align: center;'>You comment was not added!</p>";
            }
            
        }
        //var_dump($_POST);
        $template_name = ROOT_DIR . $this->views_dir . 'single-post.php';
        include_once ROOT_DIR . '/views/layout/' . $this->layout;
    }
}
