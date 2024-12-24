<?php 
use Core\Response;
function ddd($value){
    echo '<pre>';
    var_dump($value);
    echo '</pre>';
   
}

function uRLIs($value){
    return $_SERVER['REQUEST_URI'] === $value;
}

function abort($code = 404){
    http_response_code($code);

    require base_path("veiws/{$code}.php");

    die();
}

function authorize($condition, $status = Response::FORBIDDEN){
  
    if(!$condition){
     abort($status);
    }
}


function base_path($path){
   return BASE_PATH . $path;
}

function veiws($path, $attribute=[]){
    extract($attribute);
    require base_path('veiws/'. $path);
}


function redirect($path){
    header("location: {$path}");
    exit();
}

function old($key, $default){
    return Core\Session::get('old')[ $key ] ?? $default;
}