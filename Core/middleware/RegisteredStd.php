<?php 
namespace Core\middleware;
class RegisteredStd{
    public function handle(){
        
        if($_SESSION['user']['user_type'] == 1 || $_SESSION['user']['user_type'] == 2 ?? false){
            abort(403);
            exit();
        }
    }
}