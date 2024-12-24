<?php 
namespace Core;

class App{
    protected static $container;
    public static function setContainer($container){
        static::$container = $container;
    }
    public static function Container(){
        return static::$container;
    }
    public static function bind($key, $resolver){
        static::Container()->bind($key, $resolver);
    }
    public static function resolve($key){
       return static::Container()->resolve($key);
    }
}