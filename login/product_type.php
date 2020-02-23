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
                      <td>รหัสสินค้า</td>
                      <td>ชื่อสินค้า</td>
                      <!--<td>รายละเอียดสินค้า</td>-->
                      <td>ประเภทสินค้า</td>
                      <td>ราคาสินค้า</td>
                      <td>จำนวนสินค้า</td>
                      <td>วันที่รับ-เข้าสินค้า</td>
                      <td colspan="2">คลังสินค้า</td>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $sql_product = "";
                    if(isset($_REQUEST['p_id'])){
                      $sql_product = "SELECT * FROM product,product_type,zone,warehouse
                      WHERE product.product_type_id = product_type.product_type_id AND product.zone_id = zone.zone_id AND product.warehouse_id = warehouse.warehouse_id AND product.product_type_id = '{$_REQUEST['p_id']}'";
                      //echo $sql_product;
                    }
                    else{
                      $sql_product = "SELECT * FROM product,product_type,zone,warehouse
                      WHERE product.product_type_id = product_type.product_type_id AND product.zone_id = zone.zone_id AND product.warehouse_id = warehouse.warehouse_id";
                      //echo $sql_product;
                    }
                    $query_sql_product_type = mysqli_query($connect,$sql_product);
                    while ($row = $query_sql_product_type->fetch_assoc()) { ?>
                      <tr>
                        <td><?php echo $row['product_id']; ?></td>
                        <td><?php echo $row['product_name']; ?></td>
                        <td><?php echo $row['product_type_name']; ?></td>
                        <td><?php echo number_format($row['product_price']); ?> : บาท</td>
                        <td><?php echo number_format($row['product_qty']); ?> : ชิ้น</td>
                        <td><?php @$date=mktime($row['product_update']); echo date("d-m-Y",$date); ?></td>
                        <td><?php echo $row['warehouse_name']."-".$row['zone_name']; ?></td>
                        <td class="text-danger"><center><img src="../img/edit.png" width="30" /></center></td>
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
