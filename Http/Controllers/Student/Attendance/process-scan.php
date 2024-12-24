<?php
use Core\App;
use Core\Database;
use Core\Validator;
use Core\Authenticator;
header('Content-Type: application/json');
$db = App::resolve(Database::class);

$data = json_decode(file_get_contents('php://input'), true);

if (!isset($data['qrData']) || empty($data['qrData'])) {
    echo json_encode(['success' => false, 'message' => 'Missing or empty QR data']);
    exit;
}

$qrData = $data['qrData']; // Assuming the QR data is passed as a plain text string

// Initialize an empty array to hold parsed data
$parsedData = [];
$lines = explode("\n", $qrData); // Split data by newline

foreach ($lines as $line) {
    
    if (empty($line)) continue;

    
    $line = trim($line);

    
    $keyValue = explode(":", $line, 2);
    
    
    if (count($keyValue) === 2) {
        $parsedData[trim($keyValue[0])] = trim($keyValue[1]);
    }
}




$first_name = $parsedData['First Name'] ?? null;
$last_name = $parsedData['Last Name'] ?? null;
$studentId = $parsedData['Student ID'] ?? null;
$program = $parsedData['Program'] ?? null;
$currentDate = date('Y-m-d');


// Validate extracted data
if (!$first_name || !$last_name || !$studentId || !$program) {

    echo json_encode(['success' => false, 'message' => 'Invalid QR data format']);
    exit;
}

try {
    // Check if student exists
    $studentQuery = $db->query(
        "SELECT * FROM `r_student` WHERE firstname =:first_name AND lastname =:last_name AND idnumber =:student_Id " , [ 'first_name' => $first_name,
        'last_name' => $last_name,
        'student_Id' => $studentId,])->find();

    if (!$studentQuery) {
        echo json_encode(['success' => false, 'message' => 'Student not found']);
        exit;
    }

    // Check if course code is valid for the program
    $courseCode = $_SESSION['selected_course_code'] ?? null; // Set during course selection
    
    $courseQuery = $db->query(
        "SELECT code, acdyr, acdsem
         FROM reg_course
         WHERE std_id = :student_id AND code = :course_code",
        [
            'student_id' => $studentId,
            'course_code' => $courseCode,
          
        ]
    )->find();

  
    if (!$courseQuery) {
        echo json_encode(['success' => false, 'message' => 'Invalid course for program']);
        exit;
    }

    $courseACDSEM = $db->query(
        "SELECT code
         FROM reg_course
         WHERE std_id = :student_id AND acdyr =:academy_year AND acdsem = :semester",
        [
            'student_id' => $studentId,
            'academy_year' => $_SESSION['user']['Academy_year'],
        'semester' => $_SESSION['user']['semester'],
          
        ]
    )->find();

    if (!$courseACDSEM) {
        echo json_encode(['success' => false, 'message' => 'Course has not been registered for student this academy year and semester']);
        exit;
    }


    $existingRecord = $db->query(
        "SELECT * FROM attendance WHERE student_id = :student_id AND course_code = :course_code AND date = :date",
        [
            'student_id' => $studentId,
            'course_code' => $courseCode,
            'date' => $currentDate
        ]
    )->find();
 
    if ($existingRecord) {
        echo json_encode(['success' => false, 'message' => 'Attendance already recorded for this course today.']);
        exit();
    }


    // Record attendance
    $result = $db->query(
        "INSERT INTO attendance (student_id, first_name, last_name, course_code, date, time_in)
         VALUES (:student_id, :first_name, :last_name, :course_code, CURDATE(), CURRENT_TIME())",
        [
            'student_id' => $studentId,
            'first_name' => $studentQuery['firstname'],
            'last_name' => $studentQuery['lastname'],
            'course_code' => $courseCode,
         
        ]
    );

    if ($result) {
    $attendanceRecords = $db->query(
        "SELECT id, student_id, first_name, last_name, course_code, date, time_in 
         FROM attendance 
         WHERE course_code = :course_code AND date=:date ORDER BY time_in ASC",
        ['course_code' => $courseCode,
        'date' => $currentDate,
        
        
        ]
    )->get();
    // var_dump($attendanceRecords);
    // die();
    // exit;
    // Send the data as JSON
    echo json_encode(['success' => true, 'data' => $attendanceRecords]);
} else {
    echo json_encode(['success' => false, 'message' => 'Failed to record attendance.']);
}
} catch (Exception $e) {
    echo json_encode(['success' => false, 'message' => 'Error processing data: ' . $e->getMessage()]);
}
