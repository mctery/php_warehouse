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
    $sql_product_id = "SELECT * FROM `product` WHERE product_id = '{$_REQUEST['p_id']}'";
    $sql_orders_type = "SELECT * FROM `orders_type`";
   ?>
   <body>
    <div class="container-fluid">
      <div id="alert_p" class="alert alert-success" style="margin-top:50px; left:50%; transform:translate(-50%,-50%); display:none; position:fixed; z-index:10;" role="alert">ลบสินค้าเรียบร้อย</div>
      <?php require 'nev_bar.php';?>
      <div class="row">
       <?php require 'side_bar.php';?>
      <div class="col-lg">
        <center>
          <?php
            $query_sql_product_id = mysqli_query($connect,$sql_product_id);
            $row = $query_sql_product_id->fetch_assoc();
            $type = $row['product_type_id'];
            $w_id = $row['warehouse_id'];
            $z_id = $row['zone_id'];
            $detail = $row['product_detail'];
            $img = $row['product_img'];
            if($img == ""){
              $img = "pre_img.jpg";
            }
          ?>
        <div class="card bg-light text-left" style="width:100%; height: auto; margin:10px 0 10px 0; padding:10px;">
          <p class="text-center"><h4>แก้ไขสินค้า</h4></p>
          <form action="update_product.php" id="product_form" name="product_form" method="post" enctype="multipart/form-data">
            <input type="hidden" name="p_id" value="<?php echo $row['product_id']; ?>">
            <div class="form-group">
              <label for="p_names">ชื่อสินค้า</label>
              <input type="text" class="form-control" name="p_names" value="<?php echo $row['product_name']; ?>">
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="p_price">ราคา</label>
                <input type="number" class="form-control" name="p_price" value="<?php echo $row['product_price']; ?>">
              </div>
              <div class="form-group col-md-6">
                <label for="p_qty">จำนวน</label>
                <input type="number" class="form-control" name="p_qty" value="<?php echo $row['product_qty']; ?>">
              </div>
              <div class="form-group col-md-6">
                <label for="p_type">ประเภทสินค้า</label>
                  <select multiple class="form-control" name="p_type">
                    <?php
                      $query_sql_product_type = mysqli_query($connect,$sql_product_type);
                      while ($row = $query_sql_product_type->fetch_assoc()) {
                      if($type == $row['product_type_id']){
                        echo "<option value='".$row['product_type_id']."' selected>".$row['product_type_name']."</option>";
                      }
                      else{
                        echo "<option value='".$row['product_type_id']."'>".$row['product_type_name']."</option>";
                      }
                   } ?>
                  </select>
              </div>
            </div>
            <div class="form-group">
              <label for="p_detail">รายละเอียดสินค้า</label>
              <textarea class="form-control" name="p_detail" rows="8" cols="80"><?php echo $detail; ?></textarea>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="p_warehouse">คลังสินค้า</label>
                  <select multiple class="form-control" name="p_warehouse">
                    <?php
                    $query_sql_warehouse = mysqli_query($connect,$sql_warehouse);
                    while ($row = $query_sql_warehouse->fetch_assoc()) {
                      if($w_id == $row['warehouse_id']){
                      echo "<option value='".$row['warehouse_id']."' selected>".$row['warehouse_name']."</option>";
                      }
                      else{
                        echo "<option value='".$row['warehouse_id']."'>".$row['warehouse_name']."</option>";
                      }
                    } ?>
                  </select>
              </div>
              <div class="form-group col-md-6">
                <label for="p_zone">โซน</label>
                  <select multiple class="form-control" name="p_zone">
                    <?php
                    $sql_zone = "SELECT * FROM `zone`";
                    $query_sql_zone = mysqli_query($connect,$sql_zone);
                    while ($row = $query_sql_zone->fetch_assoc()) {
                      if($z_id == $row['zone_id']){
                      echo "<option value='".$row['zone_id']."' selected>".$row['zone_name']."</option>";
                      }
                      else{
                        echo "<option value='".$row['zone_id']."'>".$row['zone_name']."</option>";
                      }
                    } ?>
                  </select>
              </div>
              <div class="form-group col-md-6">
                  <label for="img_file">อัพโหลดรูปภาพ</label>
                  <input type="file" id="img_file" name="p_img" onchange="document.getElementById('load_img').src = window.URL.createObjectURL(this.files[0]);">
              </div>
              <div class="form-group col-md-6">
                <span class="input-group"><img id="load_img" class="rounded" src="../img/product/<?php echo $img; ?>" width="100" height="100"></span>
              </div>
            </div>
            <button type="submit" class="btn btn-primary">แก้ไขสินค้า</button>
            <button type="reset" class="btn btn-danger" onclick="delete_product()">ลบ</button>
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
