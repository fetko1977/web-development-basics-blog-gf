<?php

//var_dump(__FILE__) . '<br>';
define( 'CURRENT_FILE_ROOT_DIR', dirname(__FILE__) . DIRECTORY_SEPARATOR);
define( 'CURRENT_FILE_ROOT_DIR_PATH', basename(dirname(__FILE__)) . DIRECTORY_SEPARATOR);

//var_dump(CURRENT_FILE_ROOT_DIR);
//echo '<br>';
//var_dump(CURRENT_FILE_ROOT_DIR_PATH);

$request = $_SERVER['REQUEST_URI'];
var_dump($request);