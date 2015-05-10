<?php

namespace Models;

class Admin_Model extends \Models\Master_Model {
    public function __construct( $args = array() ) {
        parent::__construct( array( 'table' => 'users') );
    }
}

