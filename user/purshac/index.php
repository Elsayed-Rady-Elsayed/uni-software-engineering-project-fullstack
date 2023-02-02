<?php
session_start();
$id = $_SESSION['pid'];
$uid = $_SESSION['id'];
$connection = mysqli_connect('localhost','root','','carrefour');
$check_cart = mysqli_query($connection, "select * from products where id='$id'");
while($p =  mysqli_fetch_array($check_cart)){
  $img = $p['image'];
  $name = $p['name'];
  $price = $p['price'];
}
?>
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
    <div class="product-info">
      <img src="../../images/<?php echo $img?>" alt="" />
      <div class="texts">
        <h1 class="name"><?php echo $name?></h1>
        <h2 class="price">price:<?php echo $price?>$</h2>
      </div>
    </div>
    <div style="margin: 10px;" class="data">
      <form action="" method="POST">
        <div class="group">
          <label for="">address</label>
          <input type="text" name="address" />
        </div>
        <div class="group">
          <label for="">phone</label>
          <input type="text" name="phone" />
        </div>
        <input type="submit" value="purchase" name="btn" />
      </form>
    </div>
  </body>
</html>
<?php 
  if(isset($_POST['btn'])){
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $add_order = "insert into order_products(address,credit_card,phone,product_id,user_id) 
    values('$address',' w','$phone','$id',$uid)";
    $run_add_order = mysqli_query($connection,$add_order);
    if($run_add_order){
        echo"<script>window.open('../confirm purchas/index.php','_self')</script>";
    }else{
      echo"error";
      }
    }
?>