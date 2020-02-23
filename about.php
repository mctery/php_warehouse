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
  $sql_orders_type = "SELECT * FROM `orders_type`";
 ?>
 <body>
  <div class="container-fluid">

    <div class="alert alert-danger" style="margin-top:20px; display:none; position:fixed; z-index:10;" role="alert">Username หรือ Password ไม่ถูกต้อง กรุณา Login ใหม่อีกครั้ง</div>

   <?php require 'nev_bar.php';?>
   <div class="row">
    <?php require 'side_bar.php';?>
    <div class="col-lg">
      <div class="content_storage" style="width: 100%; height:auto; overflow:hidden;">
        <div style="width:100%; margin-top:20px;"><p class="h6"><b>พื้นที่คงเหลือโกดัง</b></p></div>
        <?php
          $query_sql_warehouse = mysqli_query($connect,$sql_warehouse);
          while ($row = $query_sql_warehouse->fetch_assoc()) {
            $warehouse_percent = 100-(((float)$row['warehouse_storage_current']/(float)$row['warehouse_storage_full'])*100);
            $warehouse_status = "";

            if($warehouse_percent >= 50){
              $warehouse_status = "<a class='text-success'>ปกติ</a>";
            }
            else if($warehouse_percent < 50 && $warehouse_percent > 25){
              $warehouse_status = "<a class='text-warning'>พื้นที่คลังสินค้าเหลือน้อย</a>";
            }
            else{
              $warehouse_status = "<a class='text-danger'>พื้นที่คลังสินค้าใกล้เต็ม</a>";
            }
        ?>
        <div class="card bg-light" style="width: 18rem; margin:10px 20px 0 0; float:left;">
          <div class="card-body">
            <h5 class="card-title"><?php echo $row['warehouse_name'];?></h5>
            <h6 class="card-subtitle mb-2 text-muted">พื้นที่คงเหลือ : <?php echo $warehouse_percent;?> %</h6>
            <p class="card-text">สถานะ : <?php echo $warehouse_status;?></p>
            <!--<a href="warehouse_manage.php?w_id=<?php echo $row['warehouse_id'];?>" class="card-link">จัดการโกดัง</a>-->
          </div>
        </div>
      <?php } ?>
      </div>
      <hr>
      <div class="card bg-light" style="width:100%; height: 400px; margin:0 0 10px 0;">
        //Graph
      </div>
      <div class="card" style="width:100%; height: 30px; margin:0 0 10px 0;">
        <p class="text-center">Warehouse .inc</p>
      </div>
    </div>
   </div>
  </div>
 </body>
</html>
