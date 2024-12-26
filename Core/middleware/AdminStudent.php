<?php 
namespace Core\middleware;
class AdminStudent{
    public function handle(){
        
        if($_SESSION['user']['user_type'] == 1  ?? false){
            abort(403);
            exit();
        }
    }
}