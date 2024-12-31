<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);
$logged_user_type = $_SESSION['user']['user_type']; 
// $studentId = $_SESSION['user']['student_id'];
$currentDate = date('Y-m-d');
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['student_id']) && !empty($_GET['student_id'])) {
        $studentId = $_GET['student_id'];

        // Fetch student_infor records 
        if( $logged_user_type == 2){
            $studentRecords = $db->query(
                "SELECT  id, idnumber, firstname, lastname, country, program
                FROM r_student 
                WHERE idnumber = :student_id",
               ['student_id' => $studentId
               ]
           )->get();
            
            }else{
                echo json_encode(['success' => false, 'message' => 'Unauthorized']);
                exit();
            }

        // Return the records as JSON
        echo json_encode(['success' => true, 'data' => $studentRecords]);
        exit();
    } else {
        echo json_encode(['success' => false, 'message' => 'Student ID is missing.']);
        exit();
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method.']);
    exit();
}
