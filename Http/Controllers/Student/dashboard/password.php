<?php 
use Core\Session;
veiws('Student/dashboard/password.view.php',[
    'errors'=> Session::get('errors'),
]);