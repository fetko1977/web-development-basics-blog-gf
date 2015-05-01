<?php

namespace GF;
final class Loader {
    private static $namespaces = array();
    
    private function __construct() {
        
    }
    
    public static function registerAutoLoad(){
        spl_autoload_register(array("\GF\Loader", "autoload"));
    }
    
    public static function autoload($class){
        self::loadClass($class);
    }
    
    public static function registerNamespace($namespace, $path){
        $namespace = trim($namespace);
        
        if (strlen($namespace) > 0) {
            if (!$path) {
                throw new \Exception('Invalid path!');
            }
            
            $path = realpath($path);
            
            if ($path && is_dir($path) && is_readable($path)) {
                self::$namespaces[$namespace] = $path . DIRECTORY_SEPARATOR;
            } else {
                //TODO
                throw new \Exception('Namespace directory read error: ' . $path);
            }
        } else {
            //TODO
            throw new \Exception('Invalid namespace: ' . $namespace);
        }
    }
}
