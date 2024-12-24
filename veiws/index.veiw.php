<?php require('partials/head.php') ?>
<?php require('partials/nav.php') ?>
  <body>
    <div class="page login-page">
      <div class="container d-flex align-items-center">
        <div class="form-holder has-shadow">
          <div class="row">
            <!-- Logo & Information Panel-->
            <div class="col-lg-6">
              <div class="info d-flex align-items-center" style="background-color:#135478">
                <div class="content">
                  <div class="logo align-items-center ">
                      <img src="/assets/img/aitlog.png" height="200" width="200" style="margin-left:180px;">
                  </div>
                   <h1>AIT STUDENT PORTAL </h1>
                  <p>This is where you want to go to University....</p>
                </div>
              </div>
            </div>
            <!-- Form Panel    -->
            <div class="col-lg-6 bg-white">
              <div class="form d-flex align-items-center">
                <div class="content">
                  <div class="alert alert-danger text-center" id="error_guys" style="display: none;"></div>
                <form id="loginForm" action="/login" method="POST">
                    <div class="form-group">
                      <label for="login-username" class="label-material">Student ID</label>
                      <input type="text" class="form-control"  name="student_id" autocomplete="student_id" required  value="<?= old('student_id', '')?>">
                     
                    </div>
                    <div class="form-group">
                      <label for="password" class="label-material">Password</label>
                      <input class="form-control" name="password" type="password" autocomplete="current-password" required> 
                      <?php if(isset($errors['student_id'])):?>
                <small style="color:red" class= "text-center"><?=$errors['student_id'] ?></small>
                <?php endif; ?>
                      <?php if(isset($errors['password'])):?>
                <p style="color:red" class= "text-center"><?=$errors['password'] ?></p>
                <?php endif; ?>
                    </div>

                      <button type="submit"  class="btn btn-primary">Login</button> 
                  </form>
                  <br>
                  <small style="color: red" class="text-center"> (Please use exactly the ID Number given to you) </small>
                </div>
                
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="copyrights text-center">
        <p><a href="#" style="color:#fff;" class="external">&copy; AIT | All right Reserved &reg; Accra Institute Of Technology</a></p>
        
      </div>
    </div>
    <script src="/assets/jquery/jquery-3.6.0.min.js"></script>
  </body>
</html>
