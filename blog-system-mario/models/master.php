<?php

namespace Models;

class Master_Model {
    protected $table;
    protected $columns;
    protected $inner_join_table;
    protected $condition;
    protected $order;
    protected $where;
    protected $limit;
    protected $db;
    
    public function __construct( $args = array() ) {
		$args = array_merge( array(
                        'inner_join_table' => '',
                        'condition' => '',
                        'order' => '',
			'where' => '',
			'columns' => '*',
			'limit' => 0
		), $args );
		
		if ( ! isset( $args['table'] ) ) {
			die( 'Table not defined. Please define a model table.' );
		}
		
		extract( $args );
		
                $this->table = $table;
                $this->columns = $columns;
                $this->inner_join_table = $inner_join_table;
                $this->condition = $condition;
                $this->order = $order;
		$this->where = $where;
		$this->limit = $limit;
		
		$db = \Lib\Database::get_instance();
		$this->db = $db::get_db();
    }
    
    public function find( $args = array() ) {
		$args = array_merge( array(
			'table' => $this->table,
                        'inner_join_table' => '',
                        'condition' => '',
                        'order' => '',
			'where' => '',
			'columns' => '*',
			'limit' => 0
		), $args );
        
		extract( $args );
                
		$query = "select {$columns} from {$table}";
		
                if( ! empty( $inner_join_table ) && !empty( $condition )) {
			$query .= ' INNER JOIN ' . $inner_join_table . ' ON ' .
                        $condition;
		}
                
                if( ! empty( $where ) ) {
			$query .= ' where ' . $where;
		}
                
                if( ! empty( $order ) ) {
			$query .= ' order by ' . $order;
		}
                
                if( ! empty( $limit ) ) {
			$query .= ' limit ' . $limit;
		}

		//var_dump($query);
		$result_set = $this->db->query( $query );
		
		$results = $this->process_results( $result_set );
		
		return $results;
    }
    
    public function get_by_id( $id ) {
        return $this->find( array ( 'where' => 'id = ' . $id));
    }
    
    public function get_by_title( $title ) {
        return $this->find( array ( 'where' => "title = '" . $title . "'" ));
    }
    
    public function get_user_by_id( $id ) {
        $user = $this->find( array(
            'table' => 'users',
            'where' => 'id = ' . $id
        ));
        
        return $user[0];
    }
    
    public function get_comments_by_post_id( $post_id ) {
        $comments = $this->find( array(
            'table' => 'comments',
            'where' => 'Post_id = ' . $post_id,
            'order' => ' date desc '
        ));
        
        return $comments;
    }
    
    public function get_user_by_username( $username ) {
        $username_value = $this->find( array(
            'table' => 'users',
            'columns' => 'username',
            'where' => 'username = ' . $username
        ));
        
        return $username_value;
    }
   
    
    public function add( $table, $element ) {
        $keys = array_keys( $element );
        $values = array();
        
        foreach ( $element as $key => $value ){
            $values[] = "'" . $this->db->real_escape_string( $value ) . "'"; 
        }
        
        $keys = implode( $keys, ',' );
        $values = implode( $values, ',' );
        
        
        $query = "INSERT INTO {$table}($keys) values($values)";
        //var_dump($query); exit();
        $this->db->query( $query );
        
	return $this->db->affected_rows;
    }
    
    public function update( $model ) {
		$query = "UPDATE " . $this->table . " SET ";
		//var_dump($model); exit();
		foreach( $model as $key => $value ) {
                    if( $key === 'id' ) {
                        continue;
                    }
                    $query .= "$key = '" . $this->db->real_escape_string( $value ) . "',"; 
		}
		$query = rtrim( $query, "," );
                //var_dump($query); exit();
		$query .= " WHERE id = " . $model['id'];
                
                
		$this->db->query( $query );
		
		return $this->db->affected_rows;
	}


    public function get_all_tags(){
        $tags = $this->find(array(
            'table' => 'tags'
        ));
        return $tags;
    }
    
    public function get_last_post(){
        $last_post = $this->find( array(
            'table' => 'posts',
            'order' => ' date desc ',
            'limit' => 1
        ));
        
        return $last_post;
    }
    
    public function get_all_post_titles(){
        $posts_titles = $this->find( array(
            'table' => 'posts',
            'columns' => ' id, title ',
            'order' => ' date desc '
        ));
        
        return $posts_titles;
    }

    protected function process_results( $result_set ){
        $results = array();

        if ( !empty( $result_set ) && $result_set->num_rows > 0 ) {
            while ( $row = $result_set->fetch_assoc() ){
                $results[] = $row;
            }
        }

        return $results;
    }
}
