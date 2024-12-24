<?php 
use Core\App;
use Core\Database;

$db = App::resolve(Database::class);


// $studentId = $_POST['student_id'];
$currentUserId = $_POST['id'];

$attendance = $db->query(
    "SELECT * FROM `attendance` WHERE id = :id",
    ['id' => $_POST['id']]
)->findOrFail();

authorize($attendance['id'] == $currentUserId);
  
    $db->query(
        "DELETE FROM `attendance` WHERE id = :id",
        ['id' => $currentUserId]
    );
    header('location:/course');
   exit();


