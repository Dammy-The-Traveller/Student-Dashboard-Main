<?php 
namespace Core;

class Validator{

    public static function string($value, $min=1, $max = INF){
        $value= trim($value);
        return strlen($value)>= $min && strlen($value)<= $max;
    }
    public static function email($value){
return filter_var($value, FILTER_VALIDATE_EMAIL);
    }
    public static function studentID($value){
        return preg_match('/^[a-zA-Z0-9]{1,20}$/', $value);
    }
    public static function greaterThan( int $value, int $greaterThan):bool{

        return $value > $greaterThan;
    }
}
