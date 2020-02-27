<!DOCTYPE html>
<html lang="en" dir="ltr">
 <head>
  <meta charset="utf-8" />
  <?php require 'head.php'; ?>
 </head>
 <?php
  require_once 'connect.php';
  $sql_warehouse = "SELECT * FROM `warehouse`";
  $sql_product_type = "SELECT * FROM `product_type`";
  $sql_orders_type = "SELECT * FROM `orders_type`";
 ?>
 <body>
  <div class="container-fluid">
   <?php require_once 'nev_bar.php';?>
   <div class="row">
    <?php require_once 'side_bar.php';?>
    <div class="col-lg" style="width:50%;">
      <div class="content_storage" style="width: 100%; height:auto; overflow:hidden;">
        <div style="width:100%; margin-top:20px;"><p class="h6"><b>พื้นที่คงเหลือโกดัง</b></p></div>
        <?php
          $query_sql_warehouse = mysqli_query($connect,$sql_warehouse);
          while ($row = $query_sql_warehouse->fetch_assoc()) {
            $warehouse_percent = (((int)$row['warehouse_storage_current']/(int)$row['warehouse_storage_full'])*100);
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
            <h6 class="card-subtitle mb-2 text-muted">พื้นที่คงเหลือ : <?php echo number_format($warehouse_percent,2,'.',' ');?> %</h6>
            <p class="card-text">สถานะ : <?php echo $warehouse_status;?></p>
            <!--<a href="warehouse_manage.php?w_id=<?php echo $row['warehouse_id'];?>" class="card-link">จัดการโกดัง</a>-->
          </div>
        </div>
      <?php } ?>
      </div>
      <hr>
      <div class="card bg-light" style="width:50%; height: auto; margin:0 0 10px 0; float:left;">
        <canvas id="canvas"></canvas>
      </div>
      <div class="card bg-light" style="width:50%; height: auto; margin:0 0 10px 0; float:left;">
        <canvas id="canvas2"></canvas>
      </div>
      <div class="card" style="width:100%; height: 30px; margin:0 0 10px 0;">
        <p class="text-center">Warehouse .inc</p>
      </div>
    </div>
   </div>
  </div>
 </body>
</html>
