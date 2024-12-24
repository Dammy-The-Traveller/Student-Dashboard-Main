<?php 
use Core\Session;
veiws('index.veiw.php',[
    'errors'=> Session::get('errors'),
]);

