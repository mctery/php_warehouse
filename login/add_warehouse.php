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
    <div class="row">
     <?php require 'side_bar.php';?>
    <div class="col-lg">
      <center>
      <div class="card bg-light text-left" style="width:100%; height: auto; margin:10px 0 10px 0; padding:10px;">
        <p class="text-center"><h4>เพิ่มคลังสินค้า</h4></p>
        <form action="insert_warehouse.php" method="post" enctype="multipart/form-data">
         <div class="form-row">
          <div class="form-group col-md-3">
            <label for="w_names">ชื่อคลังสินค้า</label>
            <input type="text" class="form-control" name="w_names" placeholder="ชื่อคลังสินค้า">
          </div>
          <div class="form-group col-md-3">
            <label for="w_storage">ความจุของคลังสินค้า / หน่วย</label>
            <input type="text" class="form-control" name="w_storage" placeholder="ระบบความจุคลังสินค้า : หน่วย">
          </div>
         </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="w_location">ที่อยู่คลังสินค้า</label>
              <textarea class="form-control" name="w_location" placeholder="ที่อยู่คลังสินค้า"  rows="10"></textarea>
            </div>
            <div class="form-group col-md-6">
                <label for="img_file">อัพโหลดรูปภาพคลังสินค้า</label>
                <input type="file" id="img_file" name="w_img" onchange="document.getElementById('load_img').src = window.URL.createObjectURL(this.files[0]);">
                <span class="input-group"><img id="load_img" class="rounded" src="../img/pre_img.jpg" width="150" height="150"></span>
            </div>
          </div>
          </div>
          <button type="submit" class="btn btn-primary">เพิ่มคลังสินค้า</button>
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
