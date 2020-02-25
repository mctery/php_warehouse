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
        <p class="text-center"><h4>จัดการ</h4></p>
        <form action="insert_orders.php" method="post">
            <div class="form-group col-md-6">
              <label for="o_type">ประเภทรายการ</label>
                <select class="form-control" name="o_type_name">
                  <?php
                  $sql_order_name = "SELECT * FROM orders_type";
                  $query_sql_orders_name = mysqli_query($connect,$sql_order_name);
                  while ($row = $query_sql_orders_name->fetch_assoc()) { ?>
                      <option value="<?php echo $row['orders_type_id'];?>"><?php echo $row['orders_type_name']; ?></option>
                    <?php } ?>
                  ?>
                </select>
            </div>
            <div class="form-group col-md-6">
              <label for="password">จำนวนสินค้า</label>
              <input type="text" class="form-control" name="o_qty">
            </div>
            <div class="form-group col-md-6">
              <label for="password">ราคาสินค้า</label>
              <input type="number" class="form-control" name="o_price">
            </div>
            <div class="form-group col-md-6">
              <label for="password">ชื่อสินค้า</label>
              <select class="form-control" name="o_name">
                <?php
                $sql_product_name = "SELECT * FROM product";
                $query_sql_product_name = mysqli_query($connect,$sql_product_name);
                while ($row = $query_sql_product_name->fetch_assoc()) { ?>
                    <option value="<?php echo $row['product_id'];?>"><?php echo $row['product_name']; ?></option>
                  <?php } ?>
                ?>
              </select>
            </div>
            <div class="form-group col-md-6">
              <label for="password">ผู้ยืนยัน</label>
              <input type="text" class="form-control" name="o_member" readonly value="<?php echo $_SESSION['member_name']; ?>">
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
