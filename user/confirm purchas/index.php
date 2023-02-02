<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>PURSHACE</title>
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <div class="header">
      carrefour
      <button id="home">home</button>
    </div>
    <form action="" method="POST">
      <div class="paymentMethod">
        <label for="">payment method</label>
        <input type="radio" checked id="cash" name="pay" value="cash" />
        <label style="display: inline" for="">cash</label>
        <input type="radio" name="pay" value="credit card" />
        <label style="display: inline" for="">credit card</label>
      </div>
      <div id="group" class="group">
        <label for="">card number</label>
        <input type="text" name="card" />
      </div>
      <input type="submit" value="confirm purshacing" name="btn" />
    </form>
    <script>
    </script>
  </body>
</html>
<?php 
$connection = mysqli_connect('localhost','root','','carrefour');
  if(isset($_POST['btn'])){
    session_start();
    $id = $_SESSION['pid'];
    $uid = $_SESSION['id'];
    $card = $_POST['card'];
    $add_order = "update order_products set credit_card='$card' where user_id='$uid' and product_id='$id'";
    $run_add_order = mysqli_query($connection,$add_order);
    if($run_add_order){
        echo"<script>window.open('../revirew prdouc/index.php','_self')</script>";
    }else{
      echo"error";
      }
    }
?>