<!DOCTYPE html>
<html lang="en" dir="ltr">
 <head>
  <meta charset="utf-8" />
  <?php
    require 'head.php';
    session_start();
  ?>
 </head>
 <?php
  require 'connect.php';
  $sql_warehouse = "SELECT * FROM `warehouse`";
  $sql_product_type = "SELECT * FROM `product_type`";
  $sql_orders_type = "SELECT * FROM `orders_type`";
 ?>
 <body>
  <div class="container-fluid">
    <?php require 'nev_bar.php';?>
    <div id="alert_d" class="alert alert-danger" style="margin-top:50px; left:50%; transform:translate(-50%,-50%); display:none; position:fixed; z-index:10;" role="alert"></div>
    <div class="row">
     <?php require 'side_bar.php';?>
    <div class="col-lg">
      <center>
      <div class="card bg-light text-left" style="width:100%; height: auto; margin:10px 0 10px 0; padding:10px;">
        <p class="text-center"><h4>เพิ่มประเภทสินค้า</h4></p>
        <form id="product_type_f" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="p_names">ชื่อประเภทสินค้า</label>
            <input type="text" class="form-control" name="p_names" placeholder="ชื่อประเภทสินค้า">
          </div>
          <div class="form-group">
            <label for="p_type_current">ประเภทสินค้าที่มีอยู่</label>
            <textarea class="form-control" id="p_type_current" name="p_type_current" rows="10" cols="80">
                <?php
                $query_sql_product_type = mysqli_query($connect,$sql_product_type);
                $number = 0;
                while ($row = $query_sql_product_type->fetch_assoc()) {
                      $number++;
                      echo "\n".$number.". ".$row['product_type_name']."\n";?>
                      <?php }?>
                      </textarea>
                      <input type="hidden" id="number_rows" value="<?php echo $number ?>" />
          </div>
          <button type="button" onclick="product_type()" class="btn btn-primary">เพิ่มประเภทสินค้า</button>
          <button type="reset" class="btn btn-danger">ยกเลิก</button>
        </form>
      </div>
    </center>
      <div class="card" style="width:100%; height: 30px; margin:0 0 10px 0;">
        <p class="text-center">Warehouse .inc</p>
      </div>
    </div>
   </div>
  </div>
 </body>
</html>
