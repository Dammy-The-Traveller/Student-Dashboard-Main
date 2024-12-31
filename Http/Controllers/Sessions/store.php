<?php 

use Core\Authenticator;
use Http\forms\Loginform;
 


$form = Loginform::validate($attributes =[
    "student_id"=>  trim($_POST["student_id"],),
    "password"=> trim($_POST["password"]),
  
]);


$signedIn = (new Authenticator)->attempt(
    $attributes['student_id'], $attributes['password']
);


if ($signedIn === 'blocked') {
 
    $form->error(
        'student_id', 'Your account has been blocked. Please contact support.'
    )->throw();
}

// var_dump($signedIn);
// exit();
if (!$signedIn) {
   $form->error(
    'student_id', 'No matching account found for that id and password.',
    
)->throw();
exit;
}

This system enables students to login, generate ID cards, and view their course information while providing administrators with tools for attendance recording and ID card management including real-time scanning updates for attendance.
redirect('/dashboard');






