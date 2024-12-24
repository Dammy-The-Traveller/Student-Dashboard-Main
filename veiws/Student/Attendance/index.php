<?php
use Core\App;
use Core\Database;
$db = App::resolve(Database::class);
$logged_user_type = $_SESSION['user']['user_type'];
$student = $_SESSION['user'];
$semester = $student['semester']; 
$acdyr = $student['Academy_year']; 
$studentId = $student['student_id']; 
try {

    $courses = $db->query("SELECT DISTINCT reg_course.code
       FROM reg_course
       WHERE  acdyr = :acdyr AND acdsem = :acdsem
       ORDER BY code ASC",
        [ 
        'acdyr' => $acdyr,
        'acdsem' => $semester
        ])->get();
    // dd($courses);
     //die();
    
} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}
?>
<?php include __DIR__ . '/../../partials/header.php'; ?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">

<style>
    body {
        font-family: Arial, sans-serif!important;
 
   
    }

    .container-fluid {
        display: flex!important;
        flex-wrap: nowrap!important;
        height: 100vh!important;
        justify-content: center!important;
        align-items: center!important;
    }

    .row {
        display: flex!important;
        flex-wrap: nowrap!important;
    }

    main {
        flex-grow: 1!important;
        padding: 1rem!important;
    }

    .courses {
        display: flex!important;
        justify-content: center!important;
        align-items: center!important;
        width: 100%;
    }

    .dt-container {
        width: 800px!important;
        margin: 0 auto!important;
        text-align: center;
    }

    .tables {
        width: 100%!important;
        border-collapse: collapse!important;
        margin-top: 1rem!important;
    }

    .tables th, .tables td {
        padding: 0.75rem!important;
        border: 1px solid #dee2e6!important;
        text-align: left!important;
    }

    .tables thead th {
        background-color: #f8f9fa!important;
    }

    .tables-striped tbody tr:nth-of-type(odd) {
        background-color: #f9f9f9!important;
    }

    .tables-bordered {
        border: 1px solid #dee2e6!important;
    }

    .course-tag {
        display: inline-block!important;
        margin: 5px!important;
        padding: 10px!important;
        background-color: #f4f4f4!important;
        border: 1px solid #ddd!important;
        border-radius: 5px!important;
        text-decoration: none!important;
        color: #333!important;
    }

    .course-tag:hover {
        background-color: #ddd!important;
    }

    .btn {
        padding: 0.375rem 0.75rem!important;
        font-size: 0.875rem!important;
        line-height: 1.5!important;
        border: 1px solid #6c757d!important;
        border-radius: 0.25rem!important;
        background-color: transparent!important;
        color: #6c757d!important;
        text-decoration: none!important;
    }

    .btn:hover {
        background-color: #e2e6ea!important;
         cursor: pointer;
    }
    .pagination{
      margin-top: 0.7rem!important;
      margin-left: 16rem!important;
    }
    .dataTables_paginate .paginate_button {
        padding: 0.5rem 1rem!important;
        font-size: 1rem!important;
        border: 1px solid #6c757d!important;
        border-radius: 1.25rem!important;
        margin: 0 2px!important;
        background-color: transparent!important;
        color: #6c757d!important;
    }

    .dataTables_paginate .paginate_button:hover {
        background-color: #e2e6ea!important;
        cursor: pointer;
    }
    .page-link {
     background-color: transparent !important;
      border: 0 !important;
    }
    .dataTables_info{
      margin-top: 1.3rem!important;
      margin-left:-7rem !important;
    }
    .dataTables_length{
      display: flex !important;
    }

    .dataTables_length label{
      margin-top: 3rem!important;
      display: -webkit-inline-box !important;
    }
    .dataTables_filter label{
      margin-top: 3rem!important;
      display: flex !important;
    }

    .footer_section {
      margin-top: -2.7rem!important;
  font-weight: bolder !important;
}
.footer_section p {
  padding: 20px 0 !important;
  margin: 0 auto!important;
  text-align: center!important;
  border-top: 1.5px solid #eeeeee!important;
  width: 80%!important;
}

.footer_section a {
  color: #cbc9c9!important;
  font-weight: bolder !important;
}
</style>

  
    <div class="container-fluid">
  
    <div class="row">
    <main>
    <div class="courses">
   


    <div class="dt-container">
      
  <h1 >Available Courses For Attendance</h1>
  <table id="attendance-table" class="table table-striped table-bordered" >
    <thead>
      <tr>
        <th>Course Code</th>
      </tr>
    </thead>
    <tbody>
  <?php if (!empty($courses)): ?>
    <?php foreach ($courses as $course): ?>
      <tr>
        <td>
          <a href="/course?course_code=<?= urlencode($course['code']) ?>" class="course-tag"  style="text-decoration: none;">
            <?= htmlspecialchars($course['code']) ?>
          </a>
        </td>
     
      </tr>
    <?php endforeach; ?>
  <?php else: ?>
    <tr>
      <td colspan="2">No courses available at the moment.</td>
    </tr>
  <?php endif; ?>
</tbody>

  </table>
  </div>
</div>

       </main>
  </div>
</div>
<footer class=" footer_section">
      <div class="">
        <p>
          &copy; <span id="displayYear"></span> All Rights Reserved By
          <a href="https://github.com/Dammy-The-Traveller">Dammy-The-Traveller</a>
        </p>
      </div>
    </footer>
<script src="/assets/js/app.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

    <script>
  $(document).ready(function () {
    $('#attendance-table').DataTable({
      paging: true,
      searching: true,
      ordering: true,
      lengthMenu: [5, 10, 25, 50],
      pageLength: 5,
      responsive: true
    });
  });

    </script>
  </body>
</html>
