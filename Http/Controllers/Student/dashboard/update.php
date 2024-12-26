<?php 
use Core\App;
use Core\Database;
use Core\Validator;
use Core\Authenticator;
$db = App::resolve(Database::class);
 //dd($_POST);
 //die();

 $logged_user_type = $_SESSION['user']['user_type'];
$currentStudentid = $_SESSION['user']['student_id'];
$currentUserid = $_SESSION['user']['id'];

// find the corresponding student
    $studentInfo = $db->query("SELECT * FROM `r_student` WHERE id =:user_id", ['user_id'=> $currentUserid])->findOrfail();
if($studentInfo){
// authorize that the current user can edit the dashboard
authorize($studentInfo['id'] == $currentUserid);
// validate the form
    $errors=[];
    
    if (isset($_POST['student_id'])) {
   if (!Validator::studentID($_POST['student_id'])) {
    $errors["student_id"] = "Invalid Student ID. Must not be greater than 20 alphanumeric characters.";
    exit;
}
    }
 
    try {
        if (isset($_POST['full_name']) && isset($_POST['program']) && isset($_POST['nationality']) ) {
            $full_name = trim($_POST['full_name']);
          $name_parts = explode(' ', $full_name, 2); 
        $first_name = $name_parts[0] ?? '';
        $last_name = $name_parts[1] ?? ''; 
         $db->query('UPDATE `r_student` SET firstname =:first_name, lastname =:last_name, program=:Program_of_choice, country=:Nationality, idnumber=:student_Id WHERE id=:user_id', [
            'first_name'=> $first_name,
            'last_name'=> $last_name,
            'Program_of_choice'=> $_POST['program'],
            'Nationality'=>$_POST['nationality'],
            'student_Id'=> $_POST['student_id'],
            'user_id' =>$currentUserid,
         ]);
        }

        // if (isset($_POST['email'])) {
        //     $db->query('UPDATE `r_student` 
        //                 SET email = :email 
        //                 WHERE id = :user_id', [
        //         'email' => $_POST['email'],
        //         'user_id' => $currentUserid,
        //     ]);
        // }

        if (isset($_POST['currentpass']) && isset($_POST['newpass']) && isset($_POST['confirmpass'])) {
            $password = $_POST['currentpass'];   
              $New_password  = $_POST['newpass'];
               $Repeat_Password = $_POST['confirmpass'];          
           if ($New_password==$Repeat_Password) {

          if (!Validator::string($New_password, 5, 255)) {
            $errors['confirmpass'] = 'Please provide a password of at least five characters.';
        }

     

        if (! empty($errors)) {
            return veiws('Student/dashboard/password.view.php', [
                'errors' => $errors
            ]);
         
        }
                         // check for the validity of the old password
         $sql = $db->query("SELECT pass1, pass2, pass3 FROM `password` WHERE id_number=:current_student_id", ['current_student_id'=>$currentStudentid])->findorfail();
    // authorize that the current user can edit the note
        
        if($sql['pass1'] ==  $password || $sql['pass2'] ==  $password || $sql['pass3'] ==  $password){
              // update password in the table
              $db->query('UPDATE `password` SET pass1 =:pass1, pass2 =:pass2, pass3=:pass3 WHERE id_number=:current_student_id', [
                'pass1'=> $_POST['newpass'],
                'pass2'=> $_POST['newpass'],
                'pass3'=> $_POST['newpass'],
                'current_student_id' =>$currentStudentid,
            ]);

            $auths = new Authenticator();
            $auths->logout();
            header("Location:/");
            exit();

           
        } else {

              $errors['currentpass']= 'Your current password is incorrect';
              if (! empty($errors)) {
                return veiws('Student/dashboard/password.view.php', [
                    'errors' => $errors
                    
                ]);
                
            }
            exit();
              }
          
              } else {
                       $errors['confirmpass']= 'Your password does not match';
                       if (! empty($errors)) {
                        return veiws('Student/dashboard/password.view.php', [
                            'errors' => $errors
                        ]);
                    }
                    exit();
              }
    }
     if(isset($_POST['student_id'])){
        $db->query('UPDATE `password` SET id_number=:student_Id WHERE id_number=:current_student_id', [
            'student_Id'=> $_POST['student_id'],
            'current_student_id' =>$currentStudentid,
        ]);
    }

    if (isset($_POST['student_id'])) {
        $db->query('UPDATE `reg_course` 
                    SET std_id = :student_Id 
                    WHERE std_id = :current_student_id', [
            'student_Id' => $_POST['student_id'],
            'current_student_id' => $currentStudentid,
        ]);

        $db->query('UPDATE `attendance` 
                    SET student_id = :student_Id 
                    WHERE student_id = :current_student_id', [
            'student_Id' => $_POST['student_id'],
            'current_student_id' => $currentStudentid,
        ]);
    }


        if (isset($_POST['email'])) {
         
            if ($logged_user_type == 1 || $logged_user_type == 2) {
                // Update both admin_technical and r_student tables
                $db->query('UPDATE `admin_technical` SET gmail=:email WHERE admin_id=:current_student_id', [
                    'email' => $_POST['email'],
                    'current_student_id' => $currentStudentid,
                ]);
            
                // $db->query('UPDATE `r_student` SET email=:email WHERE idnumber=:current_student_id', [
                //     'email' => $_POST['email'],
                //     'current_student_id' => $currentUserid,
                // ]);
            } else {
                // Update only the r_student table
                $db->query('UPDATE `r_student` SET email=:email WHERE idnumber=:current_student_id', [
                    'email' => $_POST['email'],
                    'current_student_id' => $currentStudentid,
                ]);
            }
       
    }
    
    if (isset($_POST['student_id'])) {
        $db->query('UPDATE `admin_technical` 
                    SET admin_id = :student_Id 
                    WHERE admin_id = :current_student_id', [
            'student_Id' => $_POST['student_id'],
            'current_student_id' => $currentStudentid,
        ]);
    }
        // var_dump($_POST);
        // die();
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
        exit();
    }
    
    $userSTUDENTID = $db->query("SELECT idnumber FROM `r_student` WHERE id =:user_id", ['user_id'=>$currentUserid])->find();
   
    //fetch student information from db into session data
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
          ['student_Id' => $userSTUDENTID['idnumber']]
    )->find();
//            var_dump($user);
//   die();
  //   if (!$user) {
  //     return false; // User not found
  // }
  
    $user['acdyr'] = $currentData['acdyr'];
   $user['acdsem'] = $currentData['sem'];
    //$user = $db->query("SELECT * FROM `r_student` WHERE id =:user_id", ['user_id'=>$currentUserid])->find();
//          var_dump($user);
//   die();
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
    // var_dump($_SESSION);
    // die();

    // REDIRECT THE USER
    header('location:/dashboard');
    exit();
}else{
    echo 'Student not found';
    exit();
}
