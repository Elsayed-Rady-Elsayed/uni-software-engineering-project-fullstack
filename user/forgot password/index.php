<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>RESTORE PASSWORD</title>
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <div class="auth-data">
      <form action="" method="POST">
        <h2>RESTORE PASSWORD</h2>
        <div style="margin-bottom: -5em;" class="input-group">
          <label for="">username</label> <input type="text" name="username" />
        </div>
        <div style="margin-bottom: -3em;" class="input-group">
          <label for="">email</label>
          <input type="text" name="email" />
        </div>
        <input style="margin-bottom: 10em;" type="submit" value="RESTORE" name="restore" />
      </form>
    </div>
    <div class="image"></div>
  </body>
</html>
<?php
  $con = mysqli_connect('localhost','root','','carrefour');
  if(isset($_POST["restore"])){
  $email = $_POST["email"];
  $username = $_POST["username"];
  $check_email_existance = "select password from user where email='$email' and username='$username'";
  $start_check = mysqli_query($con, $check_email_existance);
  $existOrNot = mysqli_num_rows($start_check);
  $the_user_data = mysqli_fetch_array( $start_check);
  if($existOrNot != 0){
    echo "<script>alert( 'your password is ' +'$the_user_data[0]')</script>";
  }else{
    echo "<script>alert('This email or phone is not true')</script>";
  }
  }
?>