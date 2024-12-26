<?php
 header('Content-Type: application/json'); 
use Core\App;
use Core\QRcodeservice;
use Core\Database;

if (!isset($_SESSION['user'])) {
    abort(403); // Unauthorized
    echo json_encode(['error' => 'Unauthorized']);
    exit;
}

if ( isset($_GET['student_id'])) {
    $studentId = htmlspecialchars($_GET['student_id']);
    
 
    $student = $_SESSION['user'];

   
    if ($student['student_id'] == $studentId) {
      
        $plainText = 
        "First Name: {$student['first_name']}  \n".
        "Last Name: {$student['last_name']}\n".
        "Program: {$student['Program_of_choice']}\n".
        "Nationality: {$student['Nationality']}\n".
        "Student ID: {$student['student_id']}\n".
        "Expiry Date:" . date('Y-m-d', strtotime('+2 year')) . "\n";


        try {
            $qrCodeGenerator = new QRcodeservice();
           // $qrCodePath = $qrCodeGenerator->generateQrCode($plainText);
           // $webPathStudent = '/assets/qrcodes/' . basename($qrCodePath); 
            
            $uniqueStudentFileName = 'student_' . md5($plainText) . '.png';
            $qrCodePathStudent = $qrCodeGenerator->generateQrCode($plainText, $uniqueStudentFileName);
            $webPathStudent = '/assets/qrcodes/' . basename($qrCodePathStudent);
            






   // Second QR Code Data (Course Information in table format)
   $programOfChoice = $student['Program_of_choice'];
   $level = $student['Program_level']; 
   $semester = $student['semester']; 
   $acdyr = $student['Academy_year']; 
   

   $db = App::resolve(Database::class);
 

   $courses = $db->query(" SELECT DISTINCT code, qstate
       FROM reg_course
       WHERE std_id = :student_id AND acdyr = :acdyr AND acdsem = :acdsem",
        [ 'student_id' => $studentId,
        'acdyr' => $acdyr,
        'acdsem' => $semester
        ]
        )->get();

   // Constructing the table-like format for the second QR code
   $plainTextCourses = "Course Code            | State\n";
   $plainTextCourses .= "---------------------------------\n";
   foreach ($courses as $course) {

    if ($course['qstate'] === 'N') {
      $coursestate = 'Approved';
  } elseif ($course['qstate'] === 'P') {
    $coursestate = 'Pending';
  } elseif ($course['qstate'] === 'R') {
    $coursestate = 'Rejected';
  } else {
    $coursestate = 'Unknown Status'; 
  }
       $plainTextCourses .= 
           str_pad($course['code'], 15) . 
        //    str_pad($course['course_name'], 20) . 
           str_pad( $coursestate, 10) . "\n";
   }

   // Generate the second QR code (Course Data in table format)
   //$qrCodePathCourses = $qrCodeGenerator->generateQrCode($plainTextCourses);
   //$webPathCourses = '/assets/qrcodes/' . basename($qrCodePathCourses);
   $uniqueCourseFileName = 'courses_' . md5($plainTextCourses) . '.png';
   $qrCodePathCourses = $qrCodeGenerator->generateQrCode($plainTextCourses, $uniqueCourseFileName);
   $webPathCourses = '/assets/qrcodes/' . basename($qrCodePathCourses);





            echo json_encode([
                'qrCodePathStudent' => $webPathStudent,
                'qrCodePathCourses' => $webPathCourses
            ]);

        } catch (Exception $e) {
            
            echo json_encode(['error' => 'Error generating QR code: ' . $e->getMessage()]);
        }
    } else {
        
        echo json_encode(['error' => 'Student not found']);
    }
} else {

    echo json_encode(['error' => 'No student information in session']);
}
