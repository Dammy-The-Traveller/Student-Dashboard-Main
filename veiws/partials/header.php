<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="shortcut icon" href="/assets/img/logo.png">
    <link rel="stylesheet" href="/assets/css/icon.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" rel="stylesheet">
    <!-- <link href="/assets/DataTables/datatables.min.css" rel="stylesheet">
<link href="/assets/DataTables/datatables.css" rel="stylesheet"> -->

</head>
<body>
    <header>
        <div  class="logo" title="University Management System">
            <img src="/assets/img/logo.png" alt="">
            <h2>A<span class="danger">I</span>T</h2>
        </div>
        <div class="navbar">
            <a href="/dashboard" class="<?= urlIs('/') ? 'active' : '' ?>">
                <span class="material-icons-sharp">home</span>
                <h3>Home</h3>
            </a>
            <?php if ($logged_user_type == null || $logged_user_type == 2): ?>
            <a href="/AllCourses" class="<?= urlIs('/AllCourses') ? 'active' : '' ?>" >
                <span class="material-icons-sharp">today</span>
                <h3>All Courses Attendance</h3>
            </a> 

            <?php endif; ?>
            <?php if ($logged_user_type == 1 || $logged_user_type == 2): ?>

                
                <a href="/Attendance" class="<?= urlIs('/Attendance' ) ? 'active' : '' ?>">
                  <span class="material-icons-sharp">grid_view</span>
                <h3>Attendance Recording</h3>
                </a>
               <?php else: ?>
                <a href="/RegisterCourse" class="<?= urlIs('/RegisterCourse') ? 'active' : '' ?>">
                  <span class="material-icons-sharp">grid_view</span>
                <h3>Registered Courses</h3>
                </a>
                <?php endif; ?>
            <a href="/password" class="<?= urlIs('/password') ? 'active' : '' ?>">
                <span class="material-icons-sharp">password</span>
                <h3>Change Password</h3>
            </a>
            <!-- <a href="/logout">
                <span class="material-icons-sharp">logout</span>
                <h3>Logout</h3>
            </a> -->
            <div style="display: flex; align-items: center; gap: 10px;">
    <form action="/logout" method="POST" style="margin: 0;">
        <input type="hidden" name="__method" value="DELETE">
       <a href=""> <button type="submit" style="background: none; border: none; display: flex; align-items: center; gap: 10px; cursor: pointer;">
            <span class="material-icons-sharp" style="font-size: 24px; color: inherit;">logout</span>
            <h3>Logout</h3>
        </button></a>
    </form>
</div>

        </div>
        <?= (urlIs('/AllCourses') || urlIs('/Attendance') || urlIs('/RegisterCourse') || urlIs('/password')) ? 
    ' <div id="profile-btn" style="display:none !important;">
            <span class="material-icons-sharp">person</span>
        </div>' 
: '<div id="profile-btn">
        <span class="material-icons-sharp">person</span>
    </div> 
    <div class="theme-toggler">
            <span class="material-icons-sharp active">light_mode</span>
            <span class="material-icons-sharp">dark_mode</span>
        </div>
    '; ?>

       
        
        
    </header>