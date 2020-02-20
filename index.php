<!DOCTYPE html>
<html lang="en" dir="ltr">
 <head>
  <meta charset="utf-8" />
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
  <script src="bootstrap/js/jquery-3.4.1.min.js"></script>
  <script src="bootstrap/js/popper.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <title>index</title>
 </head>
 <?php
  require 'connect.php';
  $sql_warehouse = "SELECT * FROM `warehouse`";
  $sql_product_type = "SELECT * FROM `product_type`";
 ?>
 <body>
  <div class="container-fluid">
   <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">ระบบคลังสินค้า</a>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
     <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item"> <a class="nav-link" href="#">หน้าแรก</a> </li>
      <li class="nav-item"> <a class="nav-link" href="#">รายชื่อสินค้าทั้งหมด</a> </li>
      <li class="nav-item"> <a class="nav-link" href="#">รายชื่อคลังสินค้าทั้งหมด</a> </li>
      <li class="nav-item"> <a class="nav-link" href="#">เกี่ยวกับเรา</a> </li>
     </ul>
     <form class="form-inline my-2 my-lg-0" method="post">
      <input class="form-control mr-sm-2" type="text" name="user" placeholder="username" />
      <input class="form-control mr-sm-2" type="text" name="pass" placeholder="password" />
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Login</button>
     </form>
    </div>
   </nav>
   <div class="row">
    <div class="col-sm">
      <br>
      <h7>ประเภทคลังสินค้า</h7>
        <?php
          $query_sql_warehouse = mysqli_query($connect,$sql_warehouse);
          while ($row = $query_sql_warehouse->fetch_assoc()) { ?>
              <a class="nav-link" href="warehouse_detail.php/w_id=<?php echo $row['warehouse_id']; ?>"><?php echo $row['warehouse_name']; ?></a>
            <?php } ?>
          <br>
      <h7>ประเภทสินค้า</h7>
      <?php
        $query_sql_product_type = mysqli_query($connect,$sql_product_type);
        while ($row = $query_sql_product_type->fetch_assoc()) { ?>
            <a class="nav-link" href="warehouse_detail.php/w_id=<?php echo $row['product_type_id']; ?>"><?php echo $row['product_type_name']; ?></a>
          <?php } ?>
        <br>
    </div>
    <div class="col">
      One of three columns
    </div>
   </div>
  </div>
 </body>
</html>
