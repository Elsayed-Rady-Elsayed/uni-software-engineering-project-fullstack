<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ADD PRODUCT</title>
    <link rel="stylesheet" href="style.css" />
  </head>
  <style>
    label{
      font-weight: bold;
      font-size: 20px;
    }
  </style>
  <body>
    <div class="auth-data">
      <form  action="" method="post" enctype="multipart/form-data">
        <h2>ADD PRODUCT</h2>
        <div class="input-group">
          <label for="">name</label> 
          <input type="text" name="pname" required/>
        </div>
        <div class="input-group">
          <label for="">describtion</label> 
          <input type="text" name="describtion" required/>
        </div>
        <div class="input-group">
          <label for="">price</label>
          <input type="text" name="price" required/>
        </div>
        <div class="input-group">
          <label for="">image</label>
          <input type="file" name="logo" required/>
        </div>
        <div class="input-group">
          <label for="">number of products</label>
          <input type="text" name="numberofproducts" required/>
        </div>
        <div class="input-group">
          <label for="">category</label>
          <input type="text" name="category" required/>
        </div>
        <input type="submit" value="+ADD" name="add" />
      </form>
    </div>
    <div class="image"></div>
  </body>
</html>
<?php
$connection = mysqli_connect('localhost', 'root', '', 'carrefour');
if(isset($_POST['add'])){
  $logo = $_FILES['logo']['name'];
  $logo_tmp = $_FILES['logo']['tmp_name'];
  move_uploaded_file($logo_tmp, "../images/$logo");
  $name = $_POST['pname'];
  $desc = $_POST['describtion'];
  $price = $_POST['price'];
  $numOfProducts = $_POST['numberofproducts'];
  $category = $_POST['category'];
  $isExist = mysqli_query($connection,"select * from products where name = '$name'");
  $num=mysqli_num_rows($isExist);
  if($num > 0){
    echo "<script>alert('this product already exist')</script>";
  }else{
  $insert_query = mysqli_query($connection, "insert into products (name,price,image,produc_desc,numOfPurchas,category) values ('$name','$price','$logo','$desc','$numOfProducts','$category')");
  if($insert_query){
    echo "<script>window.open('../../admin/products board/index.php','_self')</script>";
  } else{
      echo "error";
  }
}
 unset($_POST['add']);
}
?>