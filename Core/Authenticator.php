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

   $student = $db->query(
    "SELECT * FROM r_student WHERE idnumber = :student_Id",
    ['student_Id' => $student_id]
)->find();


$passwordData = $db->query(
    "SELECT * FROM password WHERE id_number = :student_Id",
    ['student_Id' => $student_id]
)->find();

$admin = $db->query(
  "SELECT * FROM admin_technical WHERE admin_id = :student_Id",
  ['student_Id' => $student_id]
)->find();

// var_dump($admin);
// exit;

$regCourse = $db->query(
  "SELECT * FROM reg_course WHERE std_id = :student_Id",
  ['student_Id' => $student_id]
)->find();






if (!$student && !$admin) {
    return false; // User not found
}

$user = [];
if ($student) {
    $user = array_merge($user, $student);
}
if ($passwordData) {
    $user = array_merge($user, $passwordData);
}
if ($regCourse) {
    $user = array_merge($user, $regCourse);
}
if ($admin) {
    $user = array_merge($user, $admin);
}


   $user['user_type'] = $admin['user_type'] ?? 0; 
   $user['gmail'] = $admin['gmail'] ?? null;     
   $user['email'] = $user['email'] ?? null;       
   $user['block'] = $user['block'] ?? 'N';    
   $user['firstname'] = $user['firstname'] ?? 'Admin';    
   $user['lastname'] = $user['lastname'] ?? 'User';       
   $user['program'] = $user['program'] ?? 'N/A';          
   $user['proglevel'] = $user['proglevel'] ?? 'N/A';      
   $user['department'] = $user['department'] ?? 'N/A';    
   $user['instid'] = $user['instid'] ?? 'N/A';            
   $user['country'] = $user['country'] ?? 'N/A';  
   $user['qdate'] = $user['qdate'] ?? date('Y-m-d');       
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
      'student_id' => $user['idnumber'] ?? $user['admin_id'],
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
  
    // session_regenerate_id(true);
    
}

public function logout(){
    Session::destroy();
  
}

}