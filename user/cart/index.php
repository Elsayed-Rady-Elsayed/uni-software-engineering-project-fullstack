<?php
session_start();
$id = $_SESSION['id'];
$connection = mysqli_connect('localhost','root','','carrefour');
$check_cart = mysqli_query($connection, "select * from cart where user_id='$id'");
while($p =  mysqli_fetch_array($check_cart)){
  $products = $p['products'];
}
$products_array = explode(',', $products);
$count = count($products_array);
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
    <?php
    for ($i = 0; $i < $count;$i++){
      $pid = $products_array[$i];
      $check_cart = mysqli_query($connection, "select * from products where id='$pid'");
      while($p = mysqli_fetch_array($check_cart)){
      echo "
      <div class=\"product-info\">
      <img src=\"../../images/${p['image']}\" alt=\"\" />
      <div class=\"texts\">
        <h1 class=\"name\">${p['name']}</h1>
        <h2 class=\"price\">price:${p['price']}$</h2>
        <form action=\"\" method='POST'>
      <input style=\"display:none\" type=\"text\" name=\"id\" value=\"${p['id']}\">
      <input style=\" background-image: linear-gradient(314deg, #6f04d9, #d9048c);
        color: white;
        border: none;
        height: 40px;
        width: 10em;
        margin-top:10px;
        cursor: pointer;\" type=\"submit\" value='purshace' name=\"purshace\">
        </form>
        </div>
        </div>
        ";
    }
  }
  if(isset($_POST['purshace'])){
      $_SESSION['pid'] = $_POST['id'];
      echo "<script>window.open('../purshac/index.php','_self')</script>";
  }
?>
  </body>
</html>
