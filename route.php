<?php
$router->get("/","index.php")->only("guest");
$router->post("/login","Sessions/store.php")->only("guest");


$router->get("/dashboard","Student/dashboard/Index.php")->only("auth");

$router->get("/QRCODE","Student/dashboard/generateQrcode.php");
$router->get("/studentinfo","Student/dashboard/StudentInfo.php");
$router->patch("/update","Student/dashboard/update.php");

$router->get("/Attendance","Student/Attendance/index.php")->only("admin");
$router->get("/course","Student/Attendance/Courseslist.php")->only("admin");
$router->post("/process-scan","Student/Attendance/process-scan.php")->only("admin");
$router->get("/attendance/fetch","Student/Attendance/fetch.php")->only("admin");
$router->delete("/destroy","Student/Attendance/destroy.php")->only("admin");

// All Courses Attendance Management
$router->get("/AllCourses","Student/Course/AllCourses.php")->only("admin&student");
$router->get("/Course","Student/Course/Course.php")->only("admin&student");
$router->get("/RegisterCourse","Student/Course/RegisterCourse.php")->only("student");
$router->get("/attendance/DisplayAll","Student/Course/fetchesAll.php")->only("admin&student");

$router->get("/password","Student/dashboard/password.php")->only("auth");


$router->delete("/logout","Sessions/destroy.php")->only("auth");