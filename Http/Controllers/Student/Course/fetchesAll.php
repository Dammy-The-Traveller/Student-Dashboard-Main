<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);
$logged_user_type = $_SESSION['user']['user_type']; 
$studentId = $_SESSION['user']['student_id'];
$currentDate = date('Y-m-d');
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['course_code']) && !empty($_GET['course_code'])) {
        $courseCode = $_GET['course_code'];

        // Fetch all attendance records for the course
        if( $logged_user_type == 2){
            $attendanceRecords = $db->query(
                "SELECT  id, student_id, first_name, last_name, course_code, date, time_in 
                FROM attendance 
                WHERE course_code = :course_code",
               ['course_code' => $courseCode
               ]
           )->get();
            }else if( $logged_user_type == null){
                $attendanceRecords = $db->query(
                    "SELECT  id, student_id, first_name, last_name, course_code, date, time_in 
                    FROM attendance 
                    WHERE course_code = :course_code AND student_id = :student_id",
                   ['course_code' => $courseCode,
                   'student_id' => $studentId
                   ]
               )->get();
            }else{
                echo json_encode(['success' => false, 'message' => 'Unauthorized']);
                exit();
            }

        // Return the records as JSON
        echo json_encode(['success' => true, 'data' => $attendanceRecords]);
        exit();
    } else {
        echo json_encode(['success' => false, 'message' => 'Course code is missing.']);
        exit();
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method.']);
    exit();
}
