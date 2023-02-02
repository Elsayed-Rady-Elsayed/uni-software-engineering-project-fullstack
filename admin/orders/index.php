<?php
$connection = mysqli_connect('localhost', 'root', '', 'carrefour');
$order = mysqli_query($connection, 'select * from order_products');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ORDERS BOARD</title>
    <link rel="stylesheet" href="style.css" />
  </head>
  <style>
    table{
      margin: 10px;
      width: 99vw;
      border: 1px solid black;
    }
    th{
      color: white;
      background-image: linear-gradient(314deg, #6f04d9, #d9048c);
    }
    table th,tr,td{
      border: 1px solid black;
      text-align: center;
      padding: 10px;
      max-width: 200px;
      font-size: 22px;
    }
    caption{
      font-size: 2em;
      color: purple;
      margin: 10px;
    }
    img{
      width: 5em;
      height: 5em;
    }
  </style>
  <body>
    <table>
      <caption>number of products is:<?php echo mysqli_num_rows($order)?></caption>
      <tr>
        <th>id</th>
        <th>address</th>
        <th>crdit card</th>
        <th>phone</th>
        <th >product id</th>
        <th >user id</th>
        <th>remove</th>
      </tr>
      <?php 
        while($p = mysqli_fetch_array($order)){
          echo "<tr>
          <td>${p['id']}</td>
          <td>${p['address']}</td>
          <td>${p['credit_card']}</td>
          <td>${p['phone']}</td>
          <td>${p['product_id']}</td>
          <td>${p['user_id']}</td>
          <td>
          <form action=\"\" method=\"post\">
          <input type=\"text\" name=\"id\" style=\"display: none;\" value='${p['id']}'>
          <input style='width:100%;height:100%;background-color:red;color:white;border:none;padding:15px;cursor:pointer' value='DELETE' name='delete' type=\"submit\">
          </form>
          </td>
          </tr>";
        }
      ?>
    </table>
  </body>
</html>
<?php 
if(isset($_POST['delete'])){
  $id = $_POST['id'];
  $delete = mysqli_query($connection, "delete from order_products where id = '$id'");
  unset($_POST['delete']); 
  echo "<script>window.location.reload();</script>";
}
?>