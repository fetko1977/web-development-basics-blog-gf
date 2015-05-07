<?php

namespace Models;

class Tag_Model extends Master_Model {
    
    public function __construct( $args = array() ) {
        parent::__construct( array( 'table' => 'tags') );
    }
    
    public function get_tags() {
        return parent::find( $args );
    }
    
    public function get_tag_by_name( $name ){
        $args = array(
            'where' => 'tags.name = ' . $name
    );
        
        return parent::find( $args );
    }
}

