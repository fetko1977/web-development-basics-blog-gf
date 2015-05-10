<?php

$hostname = $_SERVER['HTTP_HOST'];
//var_dump($hostname);
if ($hostname === 'localhost') {
    define( 'DB_HOST', 'localhost' );
    define( 'DB_NAME', 'blogsystem_softuni' );
    define( 'DB_USER', 'root' );
    define( 'DB_PASS', '' );
} else {
    define( 'DB_HOST', 'localhost' );
    define( 'DB_NAME', 'codemy8_blogsystem_softuni' );
    define( 'DB_USER', 'codemy8_fetko77' );
    define( 'DB_PASS', 'krisani1977' );
}
    



