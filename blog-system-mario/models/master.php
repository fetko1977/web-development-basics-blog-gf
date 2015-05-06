<?php

namespace Models;
class Master_Model {
    
    protected $table;
    protected $columns;
    protected $inner_join_table;
    protected $condition;
    protected $where;
    protected $limit;
    protected $db;
    
    public function __construct( $args = array() ) {
		$args = array_merge( array(
                        'inner_join_table' => '',
                        'condition' => '',
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
    
    public function get_post_by_title( $title ) {
        return $this->find( array ( 'where' => "title = '" . $title . "'" ));
    }
    
    public function get_user_by_id( $id ) {
        $user = $this->find( array(
            'table' => 'users',
            'where' => 'id = ' . $id
        ));
        
        return $user;
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
