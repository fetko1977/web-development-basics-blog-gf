<?php
error_reporting(E_ALL & ~E_NOTICE);

// Define root dir and root path
define( 'DS', '/' );
define( 'ROOT_DIR', dirname( __FILE__ ) . DS );
define( 'ROOT_PATH', basename( dirname( __FILE__ ) ) . DS );
define( 'ROOT_URL', 'http://' . $_SERVER['HTTP_HOST'] . DS . ROOT_PATH);
//var_dump($_SERVER['HTTP_HOST']);

$request_home = DS . ROOT_PATH;

$request = $_SERVER['REQUEST_URI'];
$components = array();
$controller = 'Master';
$method = 'index';
$admin_routing = false;
$param = array();

include_once 'config/db.php';
include_once 'lib/database.php';
include_once 'lib/auth.php';
include_once 'controllers/master_controller.php';
$master_controller = new \Controllers\Master_Controller();

if ( ! empty( $request ) ) {
	if( 0 === strpos( $request, $request_home ) ) {
                
		$request = substr( $request, strlen( $request_home ) );
		
		if( 0 === strpos( $request, 'admin' ) ) {
			$admin_routing = true;
			include_once 'controllers/admin/admin.php';
			$request = substr( $request, strlen( 'admin/' ) );
		}
		
		$components = explode( DS, $request, 3 );
                //var_dump($components);
		if ( 1 < count( $components ) ) {
			list( $controller, $method ) = $components;
			
			$param = isset( $components[2] ) ? $components[2] : array();
		}
	}
}
//var_dump($controller);
//var_dump($method);
$admin_folder = $admin_routing ? 'admin/' : '';
if ( isset( $controller ) && file_exists( 'controllers/' . $admin_folder . $controller . '.php' ) ) {
    //echo $controller;
	$admin_folder = $admin_routing ? 'admin/' : '';
	include_once 'controllers/' . $admin_folder . $controller . '.php';
	$admin_namespace = $admin_routing ? '\Admin' : '';
	
	$controller_class = $admin_namespace . '\Controllers\\' . ucfirst( $controller ) . '_Controller';
	$instance = new $controller_class();
	
	if( method_exists( $instance, $method ) ) {
		call_user_func_array( array( $instance, $method ), array( $param ) );
	} else {
		call_user_func_array( array( $instance, 'index' ), array() );
	}
} else {
	$master_controller->index();
}