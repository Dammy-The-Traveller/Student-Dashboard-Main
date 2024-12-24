<?php 
$logged_user_type = $_SESSION['user']['user_type'];
if (isset($_GET['course_code'])) {
    $_SESSION['selected_course_code'] = $_GET['course_code'];
} elseif (isset($_POST['course_code'])) {
    $_SESSION['selected_course_code'] = $_POST['course_code'];
}
?>
<?php include __DIR__ . '/../../partials/header.php'; ?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
<style>
    body {
        font-family: Arial, sans-serif!important;
 
   
    }

        #scanner {
             flex: 1; 
           margin-right: 15px !important;
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
      margin-left: 19rem!important;
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
      margin-left:-6rem !important;
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
      margin-bottom: 20px!important;
    }

    .delete-btn{
        background-color: #dc3545!important;
        border-color: #dc3545!important;
        color: white!important;
        border-radius: 3px!important;
        padding: 5px 10px!important;
        cursor: pointer;
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

<body>
<div class="container-fluid">
 <div class="row">
   <main >
  
   <div class="btn-toolbar mb-2 mb-md-0">
   <div class="btn-group me-2">
            <a  href="/Attendance" type="button" class="btn btn-sm btn-outline-secondary" >Back</a>      
    </div>
    </div>    <br> <br>
    <div class="courses">
    <div id="scanner">
        <!-- <h3>QR Code Scanner</h3> -->
        <div id="reader" style="width: 300px; border-radius: solid #fff 5px"></div>
    </div>
    <div class="dt-container">
        <h1>Attendance Records</h1>
        <table id="attendance-table" class="table table-striped table-bordered">
            <thead>
                <tr>
                 <th>Student ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Course code</th>
                    <th>Date</th>
                    <th>Time-In</th>
                    <th>Cancel</th>
                </tr>
            </thead>
            <tbody>
                
            </tbody>
        </table>
    </div>
    </div>
 </main>
 </div>
</div>
 

</body>
<footer class=" footer_section">
      <div class="">
        <p>
          &copy; <span id="displayYear"></span> All Rights Reserved By
          <a href="https://github.com/Dammy-The-Traveller">Dammy-The-Traveller</a>
        </p>
      </div>
    </footer>
  <script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
  <script src="/assets/js/html5-qrcode.min.js" type="text/javascript"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
  

<script>
     document.addEventListener('DOMContentLoaded', function () {
    const courseCode = "<?php echo $_SESSION['selected_course_code']; ?>"; 

    fetch(`/attendance/fetch?course_code=${courseCode}`, {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json',
        },
    })
    .then((response) => response.json())
    .then((data) => {
        if (data.success) {
            initializeAttendanceTable(data.data);
        } else {
            console.error('Error fetching attendance:', data.message);
        }
    })
    .catch((error) => {
        console.error('Fetch error:', error);
    });
});

// Initialize scanner instance
const html5QrCode = new Html5Qrcode("reader");
let isScanning = true;

function onScanSuccess(decodedText, decodedResult) {
    if (!isScanning) return;

    console.log(`Code scanned: ${decodedText}`);
    isScanning = false;

    html5QrCode.stop().then(() => {
        console.log("Scanner stopped successfully");

        fetch('/process-scan', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ qrData: decodedText })
        })
        .then(response => response.json())
        .then(data => {
            console.log(data);
            if (data.success) {
                initializeAttendanceTable(data.data);
                
            } else {
                alert(`Error: ${data.message}`);
            }
            isScanning = true;
            html5QrCode.start({ facingMode: "environment" }, config, onScanSuccess);
        })
        .catch(error => {
            console.error("Error processing QR code:", error);
            isScanning = true;
            html5QrCode.start({ facingMode: "environment" }, config, onScanSuccess);
        });

    }).catch(err => {
        console.error("Error stopping scanner:", err);
    });
}

const config = { fps: 10, qrbox: { width: 250, height: 250 } };

html5QrCode.start({ facingMode: "environment" }, config, onScanSuccess).catch((err) => {
    console.error("Unable to start scanning:", err);
});

let dataTableInstance = null;


function initializeAttendanceTable(records) {
    console.log(records); 
    const tableBody = document.querySelector('#attendance-table tbody');
    tableBody.innerHTML = ""; // Clear the table body

    records.forEach(record => {
        const row = document.createElement('tr');
        row.id = `row-${record.id}`;
        row.innerHTML = `
            <td>${record.student_id}</td>
            <td>${record.first_name}</td>
            <td>${record.last_name}</td>
            <td>${record.course_code}</td>
            <td>${record.date}</td>
            <td>${record.time_in}</td>
            <td>
                <form id="delete-form" method="POST" action="/destroy">
                    <input type="hidden" name="__method" value="DELETE">
                    <input type="hidden" name="id" value="${record.id}">
                    <button value="${record.id}" class="delete-btn" ><i class="fas fa-user-times"></i></i></button>
                </form>
            </td>
        `;
        tableBody.appendChild(row);
    });

    if (!dataTableInstance) {
        // Initialize DataTable only once
        dataTableInstance = $('#attendance-table').DataTable({
            paging: true,
            searching: true,
            ordering: true,
            lengthMenu: [5, 10, 25, 50],
            pageLength: 5,
            responsive: true
        });
    } else {
        dataTableInstance.clear();
        dataTableInstance.rows.add($(tableBody).find('tr')).draw();
    }
}
</script>

</html>
