<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>LOGIN</title>
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <div class="auth-data">
      <form action="" method="POST">
        <h2>LOGIN</h2>
        <div class="input-group">
          <label for="">username</label> <input type="text" name="username" />
        </div>
        <div style="margin-top: -2em;" class="input-group">
          <label for="">password</label>
          <input type="password" name="password" />
          <p id="forgot-pass" class="forgot-password">forgot password?</p>
        </div>
        <input type="submit" value="LOGIN" name="login" />
        <div id="register-btn" style="margin-bottom: 6em;">don't have an account?<span>REGISTER</span></div>
      </form>
    </div>
    <div class="image"></div>
    <script>
      document.getElementById('forgot-pass').onclick=function (){
        window.open('../forgot password/index.php','_self');
      }
      document.getElementById('register-btn').onclick=function (){
        window.open('../register/index.php','_self');
      }
    </script>
  </body>
</html>
<?php
  session_start();
  $con = mysqli_connect('localhost','root','','carrefour');
  if(isset($_POST["login"])){
  $username = $_POST["username"];
  $password = $_POST["password"];
  $check_email_existance = "select * from user where username = '$username' and password = '$password'";
  $start_check = mysqli_query($con, $check_email_existance);
  $existOrNot = mysqli_num_rows($start_check);
  if($existOrNot != 0){
    while($u = mysqli_fetch_array($start_check)){
      $_SESSION['id'] = $u['id']; 
    }
    echo "<script>window.open(\"../home/index.php\",\"_self\");</script>";      
  }else{
    echo "<script>alert('This email or password is not true')</script>";
  }
  }
?>