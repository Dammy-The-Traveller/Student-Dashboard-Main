<?php 
namespace Core\middleware;
class Admin{
    public function handle(){
        
        if($_SESSION['user']['user_type'] == null ?? false){
            abort(403);
            exit();
        }
    }
}