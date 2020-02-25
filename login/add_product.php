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
        <p class="text-center"><h4>เพิ่มสินค้า</h4></p>
        <form action="insert_product.php" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="p_names">ชื่อสินค้า</label>
            <input type="text" class="form-control" name="p_names" placeholder="ชื่อสินค้า">
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="p_price">ราคา</label>
              <input type="number" class="form-control" name="p_price" placeholder="ระบุราคา">
            </div>
            <div class="form-group col-md-6">
              <label for="p_qty">จำนวน</label>
              <input type="number" class="form-control" name="p_qty" placeholder="ระบุจำนวน">
            </div>
            <div class="form-group col-md-6">
              <label for="p_type">ประเภทสินค้า</label>
                <select multiple class="form-control" name="p_type">
                  <?php
                  $query_sql_product_type = mysqli_query($connect,$sql_product_type);
                  while ($row = $query_sql_product_type->fetch_assoc()) { ?>
                      <option value="<?php echo $row['product_type_id'];?>"><?php echo $row['product_type_name']; ?></option>
                    <?php } ?>
                  ?>
                </select>
            </div>
          </div>
          <div class="form-group">
            <label for="p_detail">รายละเอียดสินค้า</label>
            <textarea class="form-control" name="p_detail" rows="8" cols="80" placeholder="ระบุรายละเอียดสินค้า"></textarea>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="p_warehouse">คลังสินค้า</label>
                <select multiple class="form-control" name="p_warehouse">
                  <?php
                  $query_sql_warehouse = mysqli_query($connect,$sql_warehouse);
                  while ($row = $query_sql_warehouse->fetch_assoc()) { ?>
                      <option value="<?php echo $row['warehouse_id'];?>"><?php echo $row['warehouse_name']; ?></option>
                    <?php } ?>
                  ?>
                </select>
            </div>
            <div class="form-group col-md-6">
              <label for="p_zone">โซน</label>
                <select multiple class="form-control" name="p_zone">
                  <?php
                  $sql_zone = "SELECT * FROM `zone`";
                  $query_sql_zone = mysqli_query($connect,$sql_zone);
                  while ($row = $query_sql_zone->fetch_assoc()) { ?>
                      <option value="<?php echo $row['zone_id'];?>"><?php echo $row['zone_name']; ?></option>
                    <?php } ?>
                  ?>
                </select>
            </div>
            <div class="form-group col-md-6">
                <label for="img_file">อัพโหลดรูปภาพ</label>
                <input type="file" id="img_file" name="p_img" onchange="document.getElementById('load_img').src = window.URL.createObjectURL(this.files[0]);">
            </div>
            <div class="form-group col-md-6">
              <span class="input-group"><img id="load_img" class="rounded" src="../img/pre_img.jpg" width="100" height="100"></span>
            </div>
          </div>
          <button type="submit" class="btn btn-primary">เพิ่มสินค้า</button>
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
