<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>EDIT PRODUCT</title>
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <div class="auth-data">
      <form  action="" method="post" enctype="multipart/form-data">
        <h2>EDIT PRODUCT</h2>
        <div class="input-group">
          <label for="">id</label> <input type="text" name="id" />
        </div>
        <div class="input-group">
          <label for="">name</label> <input type="text" name="name" />
        </div>
        <div class="input-group">
          <label for="">describtion</label> <input type="text" name="describtion" />
        </div>
        <div class="input-group">
          <label for="">price</label>
          <input type="text" name="price" />
        </div>
        <div class="input-group">
          <label for="">image</label>
          <input type="file" name="logo" />
        </div>
        <div class="input-group">
          <label for="">number of products</label>
          <input type="text" name="numberofproducts" />
        </div>
        <div class="input-group">
          <label for="">category</label>
          <input type="text" name="category" />
        </div>
        <input type="submit" value="EDIT" name="edit" />
      </form>
    </div>
    <div class="image"></div>
  </body>
</html>
<?php
$connection = mysqli_connect('localhost', 'root', '', 'carrefour');
  if(isset($_POST['edit'])){
    $id = $_POST['id'];
    $logo = $_FILES['logo']['name'];
    $logo_tmp = $_FILES['logo']['tmp_name'];
    move_uploaded_file($logo_tmp, "../images/$logo");
    $name = $_POST['name'];
    $desc = $_POST['describtion'];
    $price = $_POST['price'];
    $numOfProducts = $_POST['numberofproducts'];
  $category = $_POST['category'];
    $isExist = mysqli_query($connection,"select * from products where id = '$id'");
    if(mysqli_num_rows($isExist) != 0){
    $edit_query = mysqli_query($connection, "update products set name = '$name', price='$price', image='$logo', produc_desc='$desc', numOfPurchas='$numOfProducts', category='$category' where id ='$id'");
    if($edit_query){
      echo "<script>window.open('../../user/home/index.html','_self')</script>";
    }else{
        echo "error";
    }
  }else{
          echo "<script>alert('this product is not exist')</script>";
  }
}
?>