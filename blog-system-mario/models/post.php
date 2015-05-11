<?php

namespace Models;

class Post_Model extends Master_Model {
    
    public function __construct( $args = array() ) {
        parent::__construct( array( 'table' => 'posts') );
    }
    
    public function get_all_posts_with_authors() {
        $args = array(
            'columns' => 'posts.id, posts.title, posts.content, posts.date, users.firstname, users.lastname',
            'inner_join_table' => 'users',
            'condition' => 'posts.User_id=users.id',
            'order' => ' date desc '
        );
        
        return parent::find( $args );
    }
    
    public function get_posts_comments_by_id( $id ){
        $args = array(
            'table' => 'comments',
            'columns' => 'comments.id, comments.content, comments.date, comments.firstname, comments.lastname',
            'where' => 'comments.Post_id = ' . $id,
            'order' => ' date desc '
        );
        
        return parent::find( $args );
    }

    public function get_posts_by_id( $post_id ) {
        $args = array(
            'columns' => 'posts.id, posts.title, posts.content, posts.date, users.firstname, users.lastname',
            'inner_join_table' => 'users',
            'condition' => 'posts.User_id=users.id AND posts.id = ' . $post_id
        );

        return parent::find( $args );
    }
    
    public function get_posts_visits_count( $id ) {
        $post_visits = $args = array(
            'table' => 'posts_visits',
            'columns' => 'visits',
            'where' => 'Post_id = ' . $id
        );
        
        return parent::find($post_visits);
    }
    
    public function update_counter( $counter_object ) {
        $query = "UPDATE posts_visits SET ";
        //var_dump($model); exit();
        foreach( $counter_object as $key => $value ) {
            if( $key === 'id' ) {
                continue;
            }
            $query .= "$key = '" . $this->db->real_escape_string( $value ) . "',"; 
        }
        //UPDATE posts_visits SET visits = `2` WHERE posts_visits.Post_id = 1
        $query = rtrim( $query, "," );
        
        $query .= " WHERE Post_id = " . $counter_object['id'];
        //var_dump($query); exit();

        $this->db->query( $query );

        return $this->db->affected_rows;
    }
    
    public function get_posts_by_current_user( $user_id ) {
        $args = array(
            'columns' => 'posts.id, posts.title, posts.content, posts.date',
            'where' => ' posts.User_id = ' . $user_id,
            'order' => ' date desc '
        );
        
        return parent::find( $args );
    }
    
    public function add_post_comment( $table, $comment ) {
        $table = 'comments';
        return parent::add( $table, $comment );
    }
    
    public function add_new_post( $post ) {
        return parent::add( 'posts', $post );
    }
    
    public function edit_post( $post ) {
        return parent::update( $post );
    }
    
    public function delete_post( $id ) {
        return parent::delete( $id );
    }
}

