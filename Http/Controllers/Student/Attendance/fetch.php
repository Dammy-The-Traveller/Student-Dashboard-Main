<?php
use Core\App;
use Core\Database;

$db = App::resolve(Database::class);
$currentDate = date('Y-m-d');
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['course_code']) && !empty($_GET['course_code'])) {
        $courseCode = $_GET['course_code'];

        // Fetch all attendance records for the course
        $attendanceRecords = $db->query(
            "SELECT  id, student_id, first_name, last_name, course_code, date, time_in 
            FROM attendance 
            WHERE course_code = :course_code AND date=:date
            ORDER BY time_in ASC",
           ['course_code' => $courseCode,
            'date' => $currentDate,
           ]
       )->get();

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
