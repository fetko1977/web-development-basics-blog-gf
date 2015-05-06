<?php

namespace Models;

class Post_Model extends Master_Model {
    
    public function __construct( $args = array() ) {
        parent::__construct( array( 'table' => 'posts') );
    }
    
    public function get_posts_with_author() {
        $args = array(
            'columns' => 'posts.title, posts.content, posts.date, users.firstname, users.lastname',
            'inner_join_table' => 'users',
            'condition' => 'posts.id=users.id'
        );
        
        return parent::find( $args );
    }
    
    public function get_posts_by_id( $post_id ) {
        $args = array(
            'columns' => 'posts.title, posts.content, posts.date, users.firstname, users.lastname',
            'inner_join_table' => 'users',
            'condition' => 'posts.id=users.id AND posts.id = ' . $post_id
        );
        
        return parent::find( $args );
    }
}

