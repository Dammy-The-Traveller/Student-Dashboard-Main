<?php 
//error_reporting(0);
use Core\Session;
use Core\ValidationException;
session_start();
const BASE_PATH = __DIR__ .'/../';
require BASE_PATH .'/vendor/autoload.php';


spl_autoload_register(function($class){

    //Core\Database
    $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);
    require base_path("{$class}.php");
});
 

require BASE_PATH . 'Core/functions.php';
require base_path("bootstrap.php");
 // require base_path('Core/Router.php');
$router = new \Core\Router();

$routes= require base_path('route.php');

$uri= parse_url($_SERVER['REQUEST_URI'])['path'];

$method= isset($_POST['__method'])? $_POST['__method']:$_SERVER['REQUEST_METHOD'];
try {
    $router->route( $uri, $method);
} catch (ValidationException $exception) {
    Session::flash('errors', $exception->errors);
    Session::flash('old', $exception->old);
    return redirect($router->previousUrl());
}

Session::unflash();

