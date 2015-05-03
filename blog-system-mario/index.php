<?php

//var_dump(__FILE__) . '<br>';
define( 'CURRENT_FILE_ROOT_DIR', dirname(__FILE__) . '/');
define( 'CURRENT_FILE_ROOT_DIR_PATH', basename(dirname(__FILE__)) . '/');

//var_dump(CURRENT_FILE_ROOT_DIR);
//echo '<br>';
//var_dump(CURRENT_FILE_ROOT_DIR_PATH);

$request = $_SERVER['REQUEST_URI'];
$request_home = '/' . CURRENT_FILE_ROOT_DIR_PATH;

$controller = 'master';
$method = 'index';
$params = array();

include_once 'controllers/Master.php';

if ( !empty($request) ) {
    if (strpos($request, $request_home) === 0) {
        $request = substr($request, strlen($request_home));
//        var_dump($request);
        
        $request_uri_components = explode('/', $request, 3);
        
        if ( count( $request_uri_components ) > 1) {
            list( $controller, $method ) = $request_uri_components;
            
            if ( isset( $request_uri_components[2] ) ) {
                $params = $request_uri_components[2];
            }
            
            include_once 'controllers/' . $controller . '.php';
        }
    }
}

//var_dump($controller);
//var_dump($method);
//var_dump($params);

//Set our requested $controller class
$controller_class = '\Controllers\\' . ucfirst( $controller ) . '_Controller';

//Make an instance from our requested $controller class
$instance = new $controller_class;

//We check if requested method exists in the current instance of current requested $controller class
if ( method_exists( $instance, $method ) ) {
    call_user_func_array( array( $instance, $method ), array( $params ) );
}