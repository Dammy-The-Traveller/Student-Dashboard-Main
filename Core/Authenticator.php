<?php 

namespace Core;
use Core\Database;
class Authenticator{
 public function attempt($student_id, $password){
    $db = App::resolve(Database::class);
    $currentData = $db->query(
      "SELECT acdyr, sem FROM tblcurracdyr LIMIT 1"
    )->find();

  if (!$currentData) {
    throw new \Exception("Current academic year data not found.");
   }

  $user = $db->query(
     "SELECT 
            r_student.*,
            password.*, 
            reg_course.*, 
            admin_technical.admin_id, admin_technical.user_type, admin_technical.gmail
         FROM `r_student`
         JOIN `password` ON r_student.idnumber = password.id_number
        LEFT JOIN `reg_course` ON r_student.idnumber = reg_course.std_id
       LEFT  JOIN `admin_technical` ON r_student.idnumber = admin_technical.admin_id
         WHERE r_student.idnumber = :student_Id OR admin_technical.admin_id = :student_Id",
        ['student_Id' => $student_id]
  )->find();

  if (!$user) {
    return false; // User not found
}


$user['acdyr'] = $currentData['acdyr'];
$user['acdsem'] = $currentData['sem'];
  //var_dump($user);
    //die();

    if($user) {
          if ($user['block'] === 'Y') {
            return 'blocked';     
        }
       if($password === $user['pass1']){
        $this->login($user);
            return true;
       }
    }
    return false;
   
 }

 public function login($user){
     // register user in session
    // dd($user);
    //  die();
     $_SESSION['user'] = [
      'id' => $user['id'],
      'email' => ($user['user_type'] == 1 || $user['user_type'] == 2) 
      ? $user['gmail'] 
      : $user['email'],
      'student_id' => $user['idnumber'],
      //  'campus' => $user['campus'],
      'first_name' => $user['firstname'],
      'last_name' => $user['lastname'],
      'Program_of_choice' => $user['program'],
      'Program_level' => $user['proglevel'],
      'Department' => $user['department'],
      'School' => $user['instid'],
       'semester' => $user['acdsem'],
       'Academy_year' => $user['acdyr'],
      // 'level' => $user['level'],
      'Nationality' => $user['country'],
      'user_type' => $user['user_type'],
      // 'profile_picture' => $user['img_name'],
       'Date' => $user['qdate'],
  ];
  
    session_regenerate_id(true);
    
}

public function logout(){
    Session::destroy();
  
}

}