<?php
$router->get("/","index.php")->only("guest");
$router->post("/login","Sessions/store.php")->only("guest");


$router->get("/dashboard","Student/dashboard/Index.php")->only("auth");

$router->get("/QRCODE","Student/dashboard/generateQrcode.php");
$router->patch("/update","Student/dashboard/update.php");

$router->get("/Attendance","Student/Attendance/index.php")->only("auth");
$router->get("/course","Student/Attendance/Courseslist.php")->only("auth");
$router->post("/process-scan","Student/Attendance/process-scan.php");
$router->get("/attendance/fetch","Student/Attendance/fetch.php");
$router->delete("/destroy","Student/Attendance/destroy.php");

// All Courses Attendance Management
$router->get("/AllCourses","Student/Course/AllCourses.php")->only("auth");
$router->get("/Course","Student/Course/Course.php")->only("auth");
$router->get("/RegisterCourse","Student/Course/RegisterCourse.php")->only("auth");
$router->get("/attendance/DisplayAll","Student/Course/fetchesAll.php");

$router->get("/password","Student/dashboard/password.php")->only("auth");


$router->delete("/logout","Sessions/destroy.php")->only("auth");