
<?php 
 $logged_user_type = $_SESSION['user']['user_type'];
include __DIR__ . '/../../partials/header.php';
 ?>

<style>
        header{position: relative!important;}
        .change-password-container{
            display: flex!important;
            align-items: center!important;
            justify-content: center!important;
            width: 100%!important;
            height: 90vh!important;
        }
        .change-password-container form{
            display: flex!important;
            flex-direction: column!important;
            justify-content: center!important;
            border-radius: var(--border-radius-2)!important;
            padding : 3.5rem!important;
            background-color: var(--color-white)!important;
            box-shadow: var(--box-shadow)!important;
            width: 95%!important;
            max-width: 32rem!important;
        }
        .change-password-container form:hover{box-shadow: none!important;}
        .change-password-container form input[type=password]{
            border: none!important;
            outline: none!important;
            border: 1px solid var(--color-light)!important;
            background: transparent!important;
            height: 2rem!important;
            width: 100%!important;
            padding: 0 .5rem!important;
        }
        .change-password-container form .box{
            padding: .5rem 0!important;
        }
        .change-password-container form .box p{
            line-height: 2!important;
        }
        .change-password-container form h2+p{margin: .4rem 0 1.2rem 0!important;} 
        .btn{
            background: none!important;
            border: none!important;
            border: 2px solid var(--color-primary) !important!important;
            border-radius: var(--border-radius-1)!important;
            padding: .5rem 1rem!important;
            color: var(--color-white)!important;
            background-color: var(--color-primary)!important;
            cursor: pointer!important;
            margin: 1rem 1.5rem 1rem 0!important;
            margin-top: 1.5rem!important;
        }
        .btn:hover{
            color: var(--color-primary)!important;
            background-color: transparent!important;
        }
        .text{
            color: var(--color-danger)!important;
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

    <div class="change-password-container">
        <form action="/update" method="POST">
        <input type="hidden" name="__method" value="PATCH">
            <h2>Create new password</h2>
            <p class="text-muted">Your new password must be different from previous used passwords.</p>
            <div class="box">
                <p class="text-muted">Current Password</p>
                <input name="currentpass" type="password" id="currentpass" autocomplete="current-password" required>
                <?php if(isset($errors['currentpass'])):?>
                <p class= "text" style="color: red; margin-top:2px;"><?=$errors['currentpass'] ?></p>
                <?php endif; ?>
            </div>
            <div class="box">
                <p class="text-muted">New Password</p>
                <input name="newpass" type="password" id="newpass" required>
            </div>
            <div class="box">
                <p class="text-muted">Confirm Password</p>
                <input name= "confirmpass" type="password" id="confirmpass" required>
                <?php if(isset($errors['confirmpass'])):?>
                <p class= "text" style="color: red; margin-top:2px;"><?=$errors['confirmpass'] ?></p>
                <?php endif; ?>
            </div>
            <div class="button">
                <input type="submit" value="Save" class="btn">
                <a href="/dashboard" class="text-muted">Cancel</a>
            </div>
        </form>    
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
<script src="/assets/js/app.js"></script>

</html>