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
        <div class="col bg-light">
          <div class="card bg-light" style="width:100%; height: auto; margin:10px 0 10px 0;">
            <table class="table" style="margin:0px;">
              <thead>
              <tr>
                  <td>รหัสรายการสินค้า</td>
                  <td colspan="2">ชื่อสินค้า</td>
                  <td>จำนวนสินค้า</td>
                  <td>ราคาสินค้า</td>
                  <td>วันที่</td>
                  <td>ยืนยันโดย (User)</td>
              </tr>
            </thead>
            <tbody>
              <?php
                $sql_product = "SELECT * FROM orders,orders_type,product
                WHERE orders.orders_type_id = orders_type.orders_type_id AND orders.product_id = product.product_id AND orders.orders_type_id = '{$_REQUEST['o_id']}'";
                //echo $sql_product;
                $query_sql_product_type = mysqli_query($connect,$sql_product);
                while ($row = $query_sql_product_type->fetch_assoc()) { ?>
                  <tr>
                    <td><?php echo $row['orders_id']; ?></td>
                    <td><?php echo $row['product_name']; ?></td>
                    <td><img class="rounded" src="../img/product/<?php echo $row['product_img'];?>" width="50px"></td>
                    <td><?php echo number_format($row['orders_qty']); ?> : ชิ้น</td>
                    <td><?php echo number_format($row['orders_price']); ?></td>
                    <td><?php @$date=mktime($row['orders_update']); echo date("d-m-Y",$date); ?></td>
                    <td><?php echo $row['order_user_submit']; ?></td>
              </tr>
            </tbody>
              <?php } ?>
            </table>
          </div>
        </div>
        <div class="card" style="width:100%; height: 30px; margin:0 0 10px 0;">
          <p class="text-center">Warehouse .inc</p>
        </div>
      </div>
   </div>
 </body>
</html>
