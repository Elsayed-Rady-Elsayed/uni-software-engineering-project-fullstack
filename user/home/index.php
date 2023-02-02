<?php
session_start();
$id = $_SESSION['id']; 
  $connection = mysqli_connect('localhost','root','','carrefour');
$products = mysqli_query($connection, 'select * from products');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>HOME</title>
    <link rel="stylesheet" href="style/all.min.css" />
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <div class="header">
      <h2>carrefour</h2>
      <!-- <p id="search" class="search">search</p> -->
      <p id="cart" class="cart">cart</p>
    </div>
    <div class="body">
      <h3>products</h3>
      <div class="products">

        <?php
          while($p = mysqli_fetch_array($products)){
            echo "
          <div class=\"flip-card\">
          <div class=\"flip-card-inner\">
            <div class=\"front\">
              <img style='width:170px;height:170px'
                src=\"../../admin/images/${p['image']}\"
                alt=\"\"
              />
            </div>
            <div class=\"back\">
              <img
                src=\"../../admin/images/${p['image']}\"
                alt=\"\"
              />
              <h3 class=\"name\">${p['name']}</h3>
              <h1>${p['price']}$</h2>
              <form action=\"\" method=\"POST\">
                <input style='display:none' type=\"text\" value='${p['id']}' name=\"id\">
                <input style='  position: relative;
                  top: 10px;
                    border-radius: 20px;
                    color: white;
                    text-decoration: none;
                    padding: 10px;
                    background-color: black;' type=\"submit\" name=\"add\" value=\"add to cart\">
              </form>
            </div>
          </div>
        </div>";
          }
        ?>
        </div>
      </div>
    </div>
    <script>
      document.getElementById('cart').onclick=function (){
        window.open('../cart/index.php','_self');
      }   
      document.getElementById('search').onclick=function (){
        window.open('../search/index.php','_self');
      }
    </script>
  </body>
</html>
<?php
$check_cart = mysqli_query($connection, "select * from cart where user_id='$id'");
$cart_exist = mysqli_num_rows($check_cart);
if($cart_exist != 0){
  while ($p = mysqli_fetch_array($check_cart))
    $products_in_cart = $p['products'];
  $products_array = explode(',', $products_in_cart);
}else{
  $select_cart = mysqli_query($connection,"insert into cart (products,user_id) values ('c','$id')");
}
if(isset($_POST['add'])){
  if (!in_array($_POST['id'],$products_array)){
    $products_in_cart .= ',' . $_POST['id'];
    $edit_cart = mysqli_query($connection, "update cart set products='$products_in_cart' where user_id='$id'");
    unset($_POST['add']);
  }else{
    echo "<script>alert('this product is on the cart')</script>";
  }
}
?>