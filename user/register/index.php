<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>REGISTER</title>
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <div class="auth-data">
      <form action="" method="POST">
        <h2>REGISTER</h2>
        <div class="input-group">
          <label for="">username</label>
          <input type="text" name="username" />
        </div>
        <div class="input-group">
          <label for="">password</label>
          <input minlength="6" type="password" name="password" />
        </div>
        <div class="input-group">
          <label for="">email</label>
          <input type="text" name="email" />
        </div>
        <div class="input-group">
          <label for="">phone</label>
          <input type="text" name="phone" />
        </div>
        <input type="submit" value="REGISTER" name="regitser" />
      </form>
    </div>
    <div class="image"></div>
  </body>
</html>
<?php
session_start();
$con = mysqli_connect('localhost','root','','carrefour');
  if(isset($_POST['regitser'])){
    $user_name = $_POST['username'];
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $phone = $_POST['phone'];
    $check_email = "select * from user where email='$email'";
    $run_check_email = mysqli_query($con,$check_email);
    $count = mysqli_num_rows($run_check_email);
    if($count > 0){
      echo"<script>alert('This email is already exist, try again')</script>";
    }else{
    $add_user = "insert into user(username,email,password,phone) 
    values('$user_name','$email','$pass',$phone)";
    $run_add_user = mysqli_query($con,$add_user);
    if($run_add_user){
        echo"<script>window.open('../login/index.php','_self')</script>";
    }else{
      echo"error";
      }
    }
  }
?>
