<!DOCTYPE html>
<html lang="en" dir="ltr">
 <head>
  <meta charset="utf-8" />
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
  <script src="bootstrap/js/jquery-3.4.1.min.js"></script>
  <script src="bootstrap/js/popper.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <script src="import_js/Chart.min.js"></script>
  <script src="import_js/main.js"></script>
  <title>Warehouse</title>
 </head>
 <?php
  require 'connect.php';
  $sql_warehouse = "SELECT * FROM `warehouse`";
  $sql_product_type = "SELECT * FROM `product_type`";
 ?>
 <body>
  <div class="container-fluid">

    <div class="alert alert-danger" style="margin-top:20px; display:none; position:fixed; z-index:10;" role="alert">Username หรือ Password ไม่ถูกต้อง กรุณา Login ใหม่อีกครั้ง</div>

   <nav class="navbar navbar-expand-lg navbar-light" style="background-color:#2980b9;">
    <a class="navbar-brand text-white" href="index.php">ระบบคลังสินค้า</a>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
     <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item"> <a class="nav-link text-white" href="#">หน้าแรก</a> </li>
      <li class="nav-item"> <a class="nav-link text-white" href="#">รายการสินค้าทั้งหมด</a> </li>
      <li class="nav-item"> <a class="nav-link text-white" href="#">รายการคลังสินค้าทั้งหมด</a> </li>
      <li class="nav-item"> <a class="nav-link text-white" href="#">เกี่ยวกับเรา</a> </li>
     </ul>
     <form class="form-inline my-2 my-lg-0" method="post">
       <ul class="navbar-nav mr-auto mt-2 mt-lg-0"><li class="nav-item"><a class="nav-link text-white" href="register.php">สมัครสมาชิก</a></li></ul>
      <input class="form-control mr-sm-2" type="text" name="user" placeholder="username" />
      <input class="form-control mr-sm-2" type="text" name="pass" placeholder="password" />
      <button class="btn btn-success" type="submit">Login</button>
     </form>
    </div>
   </nav>
   <div class="row">
    <div class="col-2 bg-light">
      <br>
      <h7><b>คลังสินค้า</b></h7>
        <?php
          $query_sql_warehouse = mysqli_query($connect,$sql_warehouse);
          while ($row = $query_sql_warehouse->fetch_assoc()) { ?>
              <a class="nav-link text-secondary" onclick="" href="#"><?php echo $row['warehouse_name']; ?></a>
            <?php } ?>
          <br>
      <h7><b>ประเภทสินค้า</b></h7>
      <?php
        $query_sql_product_type = mysqli_query($connect,$sql_product_type);
        while ($row = $query_sql_product_type->fetch_assoc()) { ?>
            <a class="nav-link text-secondary" href="product_type.php/w_id=<?php echo $row['product_type_id']; ?>"><?php echo $row['product_type_name']; ?></a>
          <?php } ?>
        <br>
    </div>
    <div class="col-lg">
      <div class="content_storage" style="width: 100%; height:auto; overflow:hidden;">
        <div style="width:100%; margin-top:20px;"><p class="h6"><b>พื้นที่คงเหลือโกดัง</b></p></div>
        <?php
          $query_sql_warehouse = mysqli_query($connect,$sql_warehouse);
          while ($row = $query_sql_warehouse->fetch_assoc()) {
            $warehouse_percent = ((float)$row['warehouse_storage_current']/(float)$row['warehouse_storage_full'])*100;
            $warehouse_status = "";
            if($warehouse_percent > 50){
              $warehouse_status = "<a class='text-success'>ปกติ</a>";
            }
            else if($warehouse_percent <= 50){
              $warehouse_status = "<a class='text-warning'>พื้นที่คลังสินค้าเหลือน้อย</a>";
            }
            else if($warehouse_percent <= 20){
              $warehouse_status = "<a class='text-danger'>พื้นที่คลังสินค้าใกล้เต็ม</a>";
            }
        ?>
        <div class="card bg-light" style="width: 18rem; margin:10px 20px 0 0; float:left;">
          <div class="card-body">
            <h5 class="card-title"><?php echo $row['warehouse_name'];?></h5>
            <h6 class="card-subtitle mb-2 text-muted">พื้นที่คงเหลือ : <?php echo $warehouse_percent;?> %</h6>
            <p class="card-text">สถานะ : <?php echo $warehouse_status;?></p>
            <canvas id="myChart" width="400" height="400"></canvas>
            <a href="warehouse_manage.php?w_id<?php echo $row['warehouse_id'];?>" class="card-link">จัดการโกดัง</a>
          </div>
        </div>
      <?php } ?>
      </div>
      <hr>
    </div>
   </div>
  </div>
 </body>
</html>
