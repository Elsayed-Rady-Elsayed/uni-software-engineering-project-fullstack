<?php 
session_start();
$id = $_SESSION['pid'];
$uid = $_SESSION['id'];
$connection = mysqli_connect('localhost','root','','carrefour');
$get_order = mysqli_query($connection,"select * from products where id = '$id'");
while ($p = mysqli_fetch_array($get_order)){
  $img = $p['image'];
  $name = $p['name'];
  $price = $p['price'];
  $img = $p['image'];
}
$get_order_address = mysqli_query($connection,"select * from order_products where product_id = '$id' and user_id='$uid'");
while ($p = mysqli_fetch_array($get_order_address)){
  $address = $p['address'];
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
        <p class="date">arrived in: 25 december</p>
        <p class="address"><?php echo $address?></p>
      </div>
    </div>
  </body>
</html>
