<?php
   $logged_user_first_name =$_SESSION['user']['first_name'];
    $logged_user_last_name =  $_SESSION['user']['last_name'];
    $logged_user_id =  $_SESSION['user']['student_id'];
    $logged_user_full_name =   $logged_user_first_name . ' '. $logged_user_last_name;
    $logged_user_type = $_SESSION['user']['user_type'];
    $logged_id = $_SESSION['user']['id'];
   ?>
<?php include __DIR__ . '/../../partials/header.php'; ?>
<style>
main {
    width: 80% !important;
    padding: !important;
}

.footer_section {
  margin-top: 16rem!important;
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
.subjects{
    display: flex!important; justify-content: space-between!important; align-items: flex-start!important; gap: 20px!important; width: 1100px!important; margin-top:8px!important;
}
.main-card{
    width: 70%!important; padding: 15px!important; border: 1px solid #ddd!important; border-radius: 4px!important; background-color: #fff!important; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1)!important;
}
.ID-CARD-GENERATOR{
    display: flex;
    justify-content: flex-start!important;

}

.horizontal-class{
    width: 50%!important;
}
.qr-container{
    padding-top:3rem !important;
}

.qr-code-cards{
    display: flex;  gap: 20px;
}
.student-card {
    border: 1px solid #ddd!important;
    padding: 20px!important;
    text-align: center!important;
    width: 300px!important;
}

.student-card img {
    width: 100px!important;
    height: 100px!important;
    border-radius: 50%!important;
}
.card {
    border-radius: 10px!important;
    box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1)!important;
}

.card img {
    margin: auto!important;
}

#card {
            position: relative!important;
            width: 500px!important;
            height: 280px!important;
            background: white!important;
            border-radius: 15px!important;
            overflow: hidden!important;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1)!important;
            font-family: 'Roboto', Arial, sans-serif!important;
            
        }

        .header {
            position: absolute!important;
            top: 0!important;
            left: 0!important;
            width: 100%!important;
            height: 60px!important;
            background: #1a4d7c!important;
            transform: skewY(-20deg)!important;
            transform-origin: top left!important;
        }

        .logo-section {
            position: relative!important;
            display: flex!important;
            flex-direction: row!important;
            align-items: center!important;
            justify-content: center!important;
            height: 80px!important;
            z-index: 1!important;
            margin-left: 140px!important;
            font-family: Arial, sans-serif!important;
        }

        .logo {
            font-size: 24px!important;
            font-weight: bold!important;
            color: #0c2f51f5!important;
            font-family: Arial, sans-serif!important;
        }

        .institute-name {
            font-size: 16px!important;
            font-weight: bold!important;
            color: #0c2f51f5!important;!important;
            text-align: center!important;
            line-height: 1.2!important;
            margin-left: 20px!important;
        }

        .content {
            display: flex!important;
            background-color: #d9edff!important; 
            gap: 20px!important;
            height: 190px!important;
          
        }

        .photo {
            width: 120px!important;
            height: 180px!important;
            background: #f0f0f0!important;
            border-radius: 5px!important;
            overflow: hidden!important;
            z-index: 2!important;
            padding-left: 9px!important;
            margin-top: -20px!important;
            
        }

        .photo img {
            width: 100%!important;
            height: 100%!important;
            object-fit: cover!important;
            border-radius: 5px!important;
        }

        .info {
            flex: 1!important;
        }

        .info-row {
            display: flex!important;
            margin-bottom: 8px!important;
            font-size: 14px!important;
        }

        .label {
            font-weight: bold!important;
            color: #1a4d7c!important;
            width: 100px!important;
        }

        .footer {
            position: absolute!important;
            bottom: 0!important;
            width: 100%!important;
            background: #1a4d7c!important;
            color: white!important;
            text-align: center!important;
            padding: 8px 0!important;
            font-size: 14px!important;
            font-weight: bold!important;
        }

   button {
    margin: 5px!important;
  }
  .save-icon{
    cursor: pointer;
  }

  .second-label{
    color: #363949!important;
    font-weight: 550!important;
  }
  @media screen and (max-width: 768px) {
 
    main {
    width: 100% !important;
    display: block !important;
    
}
.subjects{
    display: inline-block !important;
}

.main-card{
    width: 50%!important; padding: 15px!important; border: 1px solid #ddd!important; border-radius: 18px!important; background-color: #fff!important; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1)!important;
}
.ID-CARD-GENERATOR{
    display: flex;
    justify-content: flex-start!important;
    margin-left: 20rem !important;
}

.horizontal-class{
    width: 50%!important;
    margin-top: 20px !important;
}


.qr-container{
    padding-top:3rem !important;
}

.qr-code-cards{
    display: flex!important;  gap: 150px !important;
}

.student-card {
    border: 1px solid #ddd!important;
    padding: 20px!important;
    text-align: center!important;
    width: 300px!important;
}

.student-card img {
    width: 100px!important;
    height: 100px!important;
    border-radius: 50%!important;
}
.card {
    border-radius: 10px!important;
    box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1)!important;
    margin-left: -10rem!important;
    width: 30% !important;
}

.card img {
    margin: auto!important;
}

#card {
            position: relative!important;
            width: 500px!important;
            height: 280px!important;
            background: white!important;
            border-radius: 15px!important;
            overflow: hidden!important;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1)!important;
            font-family: 'Roboto', Arial, sans-serif!important;
            
        }

        .header {
            position: absolute!important;
            top: 0!important;
            left: 0!important;
            width: 100%!important;
            height: 60px!important;
            background: #1a4d7c!important;
            transform: skewY(-20deg)!important;
            transform-origin: top left!important;
        }

        .logo-section {
            position: relative!important;
            display: flex!important;
            flex-direction: row!important;
            align-items: center!important;
            justify-content: center!important;
            height: 80px!important;
            z-index: 1!important;
            margin-left: 140px!important;
            font-family: Arial, sans-serif!important;
        }

        .logo {
            font-size: 24px!important;
            font-weight: bold!important;
            color: #0c2f51f5!important;
            font-family: Arial, sans-serif!important;
        }

        .institute-name {
            font-size: 16px!important;
            font-weight: bold!important;
            color: #0c2f51f5!important;!important;
            text-align: center!important;
            line-height: 1.2!important;
            margin-left: 20px!important;
        }

        .content {
            display: flex!important;
            background-color: #d9edff!important; 
            gap: 20px!important;
            height: 190px!important;
          
        }

        .photo {
            width: 120px!important;
            height: 180px!important;
            background: #f0f0f0!important;
            border-radius: 5px!important;
            overflow: hidden!important;
            z-index: 2!important;
            padding-left: 9px!important;
            margin-top: -20px!important;
            
        }

        .photo img {
            width: 100%!important;
            height: 100%!important;
            object-fit: cover!important;
            border-radius: 5px!important;
        }

        .info {
            flex: 1!important;
        }

        .info-row {
            display: flex!important;
            margin-bottom: 8px!important;
            font-size: 14px!important;
        }

        .label {
            font-weight: bold!important;
            color: #1a4d7c!important;
            width: 100px!important;
        }

        .footer {
            position: absolute!important;
            bottom: 0!important;
            width: 100%!important;
            background: #1a4d7c!important;
            color: white!important;
            text-align: center!important;
            padding: 8px 0!important;
            font-size: 14px!important;
            font-weight: bold!important;
        }

   button {
    margin: 5px!important;
  }
  .save-icon{
    cursor: pointer;
  }
  }
</style>
    <div class="container">
        <aside>
            <div class="profile">
                <div class="top">
                    <div class="profile-photo">
                        <img src="/assets/img/profile-1.jpg" alt="">
                    </div>
                    <div class="info">
                        <p>Hey, <b><?= $logged_user_first_name ?></b> </p>
                        <small class="text-muted"><?=  $logged_user_id ?></small>
                    </div>
                </div>
                <div class="about">
                    <h5>Program</h5>
                    <p><?= $_SESSION['user']['Program_level']. ' ' . 'in' . ' ' . $_SESSION['user']['Program_of_choice']; ?></p>
                    <h5>Nationality</h5>
                    <p><?= $_SESSION['user']['Nationality'] ?> </p>
                    <h5>Student ID Number</h5>
                    <p><?= $_SESSION['user']['student_id'] ?>
                  </p>
                    <h5>Current Academy Semester</h5>
                    <p><?= $_SESSION['user']['semester'] ?></p>
                    <h5>Academic Year</h5>
                    <p><?= $_SESSION['user']['Academy_year'] ?></p>


                    <form id="email-form" action="/update" method="POST">
                    <input type="hidden" name="__method" value="PATCH">
                    <h5>Email</h5>
                    <p>
                        <span id="email-display"><?= $_SESSION['user']['email']; ?></span>
                    <input type="email" name="email" id="email-input" value="<?= $_SESSION['user']['email']; ?>" 
                    style="display: none!important; border: 1px solid #ccc!important; border-radius: 4px!important; padding: 4px!important;">
                    <a href="#" class="edit-icon" onclick="makeEditable('email')" style="text-decoration: none!important; color: #007bff!important;">
            <i class="fa fa-pen"></i>
          </a>
          <button type="submit" class="save-icon" style="display: none!important; border: none!important; background: none!important; color: green!important;">
            <i class="fa-solid fa-check"></i>
          </button>
          <a href="#" class="cancel-icon" onclick="cancelEdit('email')" style="display: none!important; text-decoration: none!important; color: red!important;">
            <i class="fa fa-times"></i>
          </a>
                  </p>
                  </form>
                </div>
            </div>
        </aside>

        <main style="flex: 1!important; margin-left: auto!important; margin-right: auto!important; padding: 16px!important; max-width: 83.333333%!important;">
       
       <h1 class="ID-CARD-GENERATOR">ID CARD GENERATOR</h1>
       <label for="Student ID">
        <strong>Student ID: </strong> <input type="text" id="StudentInfoId" style="display:border: 1px solid #ccc!important; border-radius: 4px!important; padding: 4px!important;">
       </label>
       <button id="generateInfoID" style="padding: 8px 16px!important; font-size: 1rem!important; background-color: #7380ec!important; color: #fff!important; border: none!important; border-radius: 4px!important; cursor: pointer!important;">Generate ID</button>
       
            <div class="subjects">

<div class="main-card" >
  <div style="display: flex!important; flex-direction: row!important;">
    <div style="text-align: center!important;">
      <img src="/assets/img/profile-pic.JPEG?height=140&width=120" alt="Profile Picture" 
           style="width: 100px!important; height: 100px!important; object-fit: cover!important; border-radius: 20%!important; border: 2px solid #ccc!important;">
    </div>
    <form id="name-form" action="/update" method="POST" style="display: inline!important;">
      <input type="hidden" name="__method" value="PATCH">
      <div style="margin-top: 10px!important; margin-left: 2rem!important;">
        <input type="text" name="id" value="<?php $logged_id ?>" style="display:none;">
        <!-- Name Field -->
        <p style="margin: 0!important; font-size: 1rem!important;">
          <strong>Name:</strong> 
          <span id="name-display"><?php echo "$logged_user_full_name" ?></span> 
          <input type="text" name="full_name" id="name-input" value="<?= $logged_user_full_name ?>" 
                 style="display: none!important; border: 1px solid #ccc!important; border-radius: 4px!important; padding: 4px!important;">
                 <?php if($logged_user_type == '2'): ?>
          <a href="#" class="edit-icon" onclick="makeEditable('name')" style="text-decoration: none!important; color: #007bff!important;">
            <i class="fa fa-pen"></i>
          </a>
          <?php endif; ?>
          <button type="submit" class="save-icon" style="display: none!important; border: none!important; background: none!important; color: green!important;">
            <i class="fa-solid fa-check"></i>
          </button>
          <a href="#" class="cancel-icon" onclick="cancelEdit('name')" style="display: none!important; text-decoration: none!important; color: red!important;">
            <i class="fa fa-times"></i>
          </a>
        </p>

        <p style="margin: 8px 0!important; font-size: 0.9rem!important;">
          <strong>Program:</strong> 
          <span id="program-display"><?= $_SESSION['user']['Program_level']. ' ' . 'in' . ' ' . $_SESSION['user']['Program_of_choice']; ?></span>
          <input type="text" name="program" id="program-input" value="<?= $_SESSION['user']['Program_of_choice'] ?>" 
                 style="display: none!important; border: 1px solid #ccc!important; border-radius: 4px!important; padding: 4px!important;">
                 <?php if($logged_user_type == '2'): ?>
                 <a href="#" class="edit-icon" onclick="makeEditable('program')" style="text-decoration: none!important; color: #007bff!important;">
            <i class="fa fa-pen"></i>
          </a>
          <?php endif; ?>
          <button type="submit" class="save-icon" style="display: none!important; border: none!important; background: none!important; color: green!important;">
            <i class="fa-solid fa-check"></i>
          </button>
          <a href="#" class="cancel-icon" onclick="cancelEdit('program')" style="display: none!important; text-decoration: none!important; color: red!important;">
            <i class="fa fa-times"></i>
          </a>
        </p>

        <p style="margin: 8px 0!important; font-size: 0.9rem!important;">
          <strong>Nationality:</strong> 
          <span id="nationality-display"><?= $_SESSION['user']['Nationality'] ?></span>
          <input type="text" name="nationality" id="nationality-input" value="<?= $_SESSION['user']['Nationality'] ?>" 
                 style="display: none!important; border: 1px solid #ccc!important; border-radius: 4px!important; padding: 4px!important;">
                 <?php if($logged_user_type == '2'): ?>
          <a href="#" class="edit-icon" onclick="makeEditable('nationality')" style="text-decoration: none!important; color: #007bff!important;">
            <i class="fa fa-pen"></i>
          </a>
          <?php endif; ?>
          <button type="submit" class="save-icon" style="display: none!important; border: none!important; background: none!important; color: green!important;">
            <i class="fa-solid fa-check"></i>
          </button>
          <a href="#" class="cancel-icon" onclick="cancelEdit('nationality')" style="display: none!important; text-decoration: none!important; color: red!important;">
            <i class="fa fa-times"></i>
          </a>
        </p>

        <p style="margin: 8px 0!important; font-size: 0.9rem!important;">
          <strong>Student No:</strong> 
          <span id="student-id-display"><?= $_SESSION['user']['student_id'] ?></span>
          <input type="text" name="student_id" id="student-id-input" value="<?= $_SESSION['user']['student_id'] ?>" 
                 style="display: none!important; border: 1px solid #ccc!important; border-radius: 4px!important; padding: 4px!important;">
                 <?php if($logged_user_type == '2'): ?>
          <a href="#" class="edit-icon" onclick="makeEditable('student-id')" style="text-decoration: none!important; color: #007bff!important;">
            <i class="fa fa-pen"></i>
          </a>
          <?php endif; ?>
          <button type="submit" class="save-icon" style="display: none!important; border: none!important; background: none!important; color: green!important;">
            <i class="fa-solid fa-check"></i>
          </button>
          <a href="#" class="cancel-icon" onclick="cancelEdit('student-id')" style="display: none!important; text-decoration: none!important; color: red!important;">
            <i class="fa fa-times"></i>
          </a>
        </p>

        <p style="margin: 8px 0!important; font-size: 0.9rem!important;">
          <strong>Expiry Date:</strong> 
          <span id="expiry-date-display"><?=  date('Y-m-d', strtotime('+2 year'))  ?></span>
          <input type="date" name="expiry_date" id="expiry-date-input" value=" date('Y-m-d', strtotime('+2 year'))" 
                 style="display: none!important; border: 1px solid #ccc!important; border-radius: 4px!important; padding: 4px!important;">
                 <?php if($logged_user_type == '2'): ?>
          <a href="#" class="edit-icon" onclick="makeEditable('expiry-date')" style="text-decoration: none!important; color: #007bff!important;">
            <i class="fa fa-pen"></i>
          </a>
          <?php endif; ?>
          <button type="submit" class="save-icon" style="display: none!important; border: none!important; background: none!important; color: green!important;">
            <i class="fa-solid fa-check"></i>
          </button>
          <a href="#" class="cancel-icon" onclick="cancelEdit('expiry-date')" style="display: none!important; text-decoration: none!important; color: red!important;">
            <i class="fa fa-times"></i>
          </a>
        </p>
      </div>
    </form>
  </div>
  <div style="margin-top: 20px!important; text-align: center!important;">
    <button id="generate-id" style="padding: 8px 16px!important; font-size: 1rem!important; background-color: #7380ec!important; color: #fff!important; border: none!important; border-radius: 4px!important; cursor: pointer!important;">Generate ID</button>
    <button id="print-id" style="padding: 8px 16px!important; font-size: 1rem!important; background-color: #6c757d!important; color: #fff!important; border: none!important; border-radius: 4px!important; cursor: pointer!important;">Print</button>
    <button id="generate-qr" style="padding: 8px 16px!important; font-size: 1rem!important; background-color: #ff7782!important; color: #fff!important; border: none!important; border-radius: 4px!important; cursor: pointer!important;">Generate QR Code</button>
  </div>
</div>





<div id="horizontal-id" class="horizontal-class" ></div>

</div>

<div id="printable-area" style="display: none!important;"></div>

   <div class="qr-container" >
        <div id="qr-placeholder" class="qr-code">
            
        </div>
        <p id="error-message" style="color:red!important; display:none!important;">Student not found. Please check the student ID.</p>
    </div>

    </main> 
        </main>
    </div>
    <footer class=" footer_section">
      <div class="">
        <p>
          &copy; <span id="displayYear"></span> All Rights Reserved By
          <a href="https://github.com/Dammy-The-Traveller">Dammy-The-Traveller</a>
        </p>
      </div>
    </footer>
    <script src="/assets/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/js/dashboard.js"></script>
    <script src="/assets/js/qrcode.min.js"></script>
    <script src="/assets/js/timeTable.js"></script>
    <script src="/assets/js/app.js"></script>
    <script>
         document.getElementById('generateInfoID').addEventListener('click', function () {
            const studentInfoID = document.getElementById('StudentInfoId').value;
          
            var studentName, studentProgram, studentNationality, studentStudentID;
            // console.log(studentInformationID);
            fetch(`/studentinfo?student_id=${studentInfoID}`, {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json',
        },
    })
    .then((response) => response.json())
    .then((data) => {
        if (data.success) {
            var result = data.data[0];
            console.log(result);
            var studentName = result.firstname + ' ' + result.lastname;
            var studentProgram = 'Bsc' + ' ' + 'in' + ' ' + result.program;
            var studentNationality = result.country;
            var studentStudentID = result.idnumber;
          
            console.log('Student Name:', studentName);
            console.log('Program:', studentProgram);
            console.log('Nationality:', studentNationality);
            console.log('Student ID:', studentStudentID);

               // Example: Update the DOM or use them elsewhere
               document.getElementById('name-display').innerText = studentName;
            document.getElementById('program-display').innerText = studentProgram;
            document.getElementById('nationality-display').innerText = studentNationality;
            document.getElementById('student-id-display').innerText = studentStudentID;

            document.getElementById('name-input').value = studentName;
            document.getElementById('program-input').value = studentProgram;
            document.getElementById('nationality-input').value = studentNationality;
           document.getElementById('student-id-input').value = studentStudentID;
        } else {
            console.error('Error fetching Student:', data.message);
        }
    })
    .catch((error) => {
        console.error('Fetch error:', error);
    });


         });
      document.getElementById('generate-id').addEventListener('click', function () {
      
          const horizontalID = `  <div id="card">
              <div class="header"></div>
              <div class="logo-section">
                  <div class="logo">AIT -</div>
                  <div class="institute-name">
                      ACCRA INSTITUTE<br>
                      OF TECHNOLOGY
                  </div>
              </div>
              <div class="content">
                  <div class="photo">
                      <img src="/assets/img/profile-pic.JPEG?height=140&width=120" alt="Student Photo">
                  </div>
                  <div class="info">
                      <div class="info-row">
                          <span class="label">Name:</span>
                          <span class="second-label"> <?= $_SESSION['user']['first_name'] . ' ' . $_SESSION['user']['last_name'] ?></span>
                      </div>
                      <div class="info-row">
                          <span class="label">Program:</span>
                          <span class="second-label"><?= $_SESSION['user']['Program_level']. ' ' . 'in' . ' ' . $_SESSION['user']['Program_of_choice']; ?></span>
                      </div>
                      <div class="info-row">
                          <span class="label">Nationality:</span>
                          <span class="second-label"><?= $_SESSION['user']['Nationality'] ?></span>
                      </div>
                      <div class="info-row">
                          <span class="label">Student No:</span>
                          <span class="second-label"><?= $_SESSION['user']['student_id'] ?></span>
                      </div>
                      <div class="info-row">
                          <span class="label">Exp. Date:</span>
                          <span class="second-label"><?= date('Y-m-d', strtotime('+1 year')) ?></span>
                      </div>
                  </div>
              </div>
              <div class="footer">STUDENT I.D CARD</div>
          </div>
              `;
          
        
          document.getElementById('horizontal-id').innerHTML = horizontalID;
      });
      
      document.getElementById('print-id').addEventListener('click', function () {
          const idCardElement = document.getElementById('horizontal-id');
          const printableArea = document.getElementById('printable-area');
      
         
          if (!idCardElement.innerHTML.trim()) {
              alert('Please generate the ID first!');
              return;
          }
      
      
          printableArea.innerHTML = idCardElement.innerHTML;
      
         
          printableArea.style.display = 'block';
      
          
         
          const printStyles = `
              <style>
                    body {
                  display: flex!important;
                  justify-content: center!important;
                  align-items: center!important;
                  min-height: 100vh!important;
                  margin: 0!important;
                  background-color: #f0f0f0!important;
               
              }
                 #card {
                  position: relative!important;
                  width: 500px!important;
                  height: 280px!important;
                  background: white!important;
                  border-radius: 15px!important;
                  overflow: hidden!important;
                  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1)!important;
                  font-family: 'Roboto', Arial, sans-serif!important;
                  
              }
      
              .header {
                  position: absolute!important;
                  top: 0!important;
                  left: 0!important;
                  width: 100%!important;
                  height: 60px!important;
                  background: #1a4d7c!important;
                  transform: skewY(-20deg)!important;
                  transform-origin: top left!important;
              }
      
              .logo-section {
                  position: relative!important;
                  display: flex!important;
                  flex-direction: row!important;
                  align-items: center!important;
                  justify-content: center!important;
                  height: 80px!important;
                  z-index: 1!important;
                  margin-left: 140px!important;
                  font-family: Arial, sans-serif!important;
              }
      
              .logo {
                  font-size: 24px!important;
                  font-weight: bold!important;
                  color: #0c2f51f5!important;
                  font-family: Arial, sans-serif!important;
              }
      
              .institute-name {
                  font-size: 16px!important;
                  font-weight: bold!important;
                  color: #0c2f51f5!important;!important;
                  text-align: center!important;
                  line-height: 1.2!important;
                  margin-left: 20px!important;
              }
      
              .content {
                  display: flex!important;
                  background-color: #d9edff!important; 
                  gap: 20px!important;
                  height: 190px!important;
                
              }
      
              .photo {
                  width: 120px!important;
                  height: 180px!important;
                  background: #f0f0f0!important;
                  border-radius: 5px!important;
                  overflow: hidden!important;
                  z-index: 2!important;
                  padding-left: 9px!important;
                  margin-top: -20px!important;
                  
              }
      
              .photo img {
                  width: 100%!important;
                  height: 100%!important;
                  object-fit: cover!important;
                  border-radius: 5px!important;
              }
      
              .info {
                  flex: 1!important;
              }
      
              .info-row {
                  display: flex!important;
                  margin-bottom: 8px!important;
                  font-size: 14px!important;
              }
      
              .label {
                  font-weight: bold!important;
                  color: #1a4d7c!important;
                  width: 100px!important;
              }
      
              .footer {
                  position: absolute!important;
                  bottom: 0!important;
                  width: 100%!important;
                  background: #1a4d7c!important;
                  color: white!important;
                  text-align: center!important;
                  padding: 8px 0!important;
                  font-size: 14px!important;
                  font-weight: bold!important;
              }
              </styl>
          `;
      
          document.body.innerHTML = `
              ${printStyles}
              ${printableArea.innerHTML}
          `;
      
          window.print();
      
          const originalStyles = document.body.innerHTML;
          document.body.innerHTML = originalStyles;
          location.reload(); 
      });
      
      document.getElementById('generate-qr').addEventListener('click', function () {
              
              const studentId = document.getElementById('student-id-display').textContent;
      
              
              if (studentId.trim() === '') {
                  alert('Student ID is missing!');
                  return;
              }
      
              
              document.getElementById('generate-qr').innerHTML = '<span>Loading QR codes...</span>';
      
              
              fetch(`/QRCODE?student_id=${studentId}`)
                  .then(response =>{
                    //console.log(response.json());
                    if (!response.ok) {
                  throw new Error(`HTTP error! status: ${response.status}`);
              }
      
              const contentType = response.headers.get('Content-Type');
                  
                  if (contentType && contentType.includes('application/json')) {
                      return response.json(); 
                  } else {
                      return response.text(); 
                  }
         
              return response.json()
              //  console.log(response);
                  }
                   )
                  .then(data => {
                  //console.log(data.qrCodePath);
                      if (data.qrCodePathStudent && data.qrCodePathCourses) {
                       
                          document.getElementById('qr-placeholder').innerHTML = `
                              
                           <div class="qr-code-cards" style=" display: flex;  gap: 20px; ">
                              <div class="card" style="width: 45%; border: 1px solid #ccc;  padding: 10px; text-align: center; margin-top:15px;">
                                  <img style=" width: 100%; max-width: 250px; height: auto;" src="${data.qrCodePathStudent}" alt="Student QR Code" />
                                  <p>Student Info QR Code</p>
                              </div>
                          
              
                               <div class="card" style="width: 45%; border: 1px solid #ccc;  padding: 10px; text-align: center; margin-top:15px;">
                                  <img style=" width: 100%; max-width: 250px; height: auto;" src="${data.qrCodePathCourses}" alt="Courses QR Code" width="200" />
                                  <p>Registered Courses QR Code</p>
                              </div>
      
                          </div>
                          `;
                          document.getElementById('generate-qr').innerHTML = '<span>QR codes Generated!!</span>';
                      }else if (data.error) {
                        console.error('Error generating QR code:', data.error);
      
                        //document.getElementById('qr-placeholder').innerHTML = '';
                       // document.getElementById('error-message').style.display = 'block';
                      }
                  })
                  .catch(error => {
                      
                    document.getElementById('qr-placeholder').innerHTML = '';
                          console.error('Error generating QR code:', error);
                         // alert('Error generating QR code. Please try again later.');
      
                  });
          });
      
      
      
      
      function makeEditable(field) {
          const displaySpan = document.getElementById(`${field}-display`);
          const inputField = document.getElementById(`${field}-input`);
          const editIcon = document.querySelector(`#${field}-display`).closest('p').querySelector('.edit-icon');
          const saveIcon = document.querySelector(`#${field}-display`).closest('p').querySelector('.save-icon');
          const cancelIcon = document.querySelector(`#${field}-display`).closest('p').querySelector('.cancel-icon');
      
          if (displaySpan && inputField && editIcon && saveIcon && cancelIcon) {
              
              displaySpan.style.display = 'none';
      
             
              inputField.style.display = 'inline';
      
              
              editIcon.style.display = 'none';
      
              
              saveIcon.style.display = 'inline';
              cancelIcon.style.display = 'inline';
          } else {
              console.error(`One or more elements for field "${field}" are missing.`);
          }
      }
      
      function cancelEdit(field) {
          const displaySpan = document.getElementById(`${field}-display`);
          const inputField = document.getElementById(`${field}-input`);
          const editIcon = document.querySelector(`#${field}-display`).closest('h6, p').querySelector('.edit-icon');
          const saveIcon = document.querySelector(`#${field}-display`).closest('h6, p').querySelector('.save-icon');
          const cancelIcon = document.querySelector(`#${field}-display`).closest('h6, p').querySelector('.cancel-icon');
      
          if (displaySpan && inputField && editIcon && saveIcon && cancelIcon) {
              
              displaySpan.style.display = 'inline';
      
           
              inputField.style.display = 'none';
      
             
              editIcon.style.display = 'inline';
      
             
              saveIcon.style.display = 'none';
              cancelIcon.style.display = 'none';
          } else {
              console.error(`One or more elements for field "${field}" are missing.`);
          }
      }
      
          </script>
</body>
</html>