<!DOCTYPE html>
<html lang="en" dir="ltr">
 <head>
  <meta charset="utf-8" />
  <?php require 'head.php'; ?>
 </head>
 <?php
  require 'connect.php';
  $sql_warehouse = "SELECT * FROM `warehouse`";
  $sql_warehouse_id = "SELECT * FROM `warehouse` WHERE warehouse_id = '{$_REQUEST['w_id']}'";
  $sql_product_type = "SELECT * FROM `product_type`";
  $sql_orders_type = "SELECT * FROM `orders_type`";
 ?>
 <body>
  <div class="container-fluid">

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
       <?php }
          $query_w_id = mysqli_query($connect,$sql_warehouse_id);
          $row = $query_w_id->fetch_assoc();
        ?>
       </div>
       <hr>
       <div class="card bg-light" style="width:100%; height: auto; margin:0 0 10px 0;">
         <center>
         <div class="card bg-light text-left" style="width:60%; height: auto; margin:10px 0 10px 0; padding:10px;">
           <p class="text-center"><h4>คลังสินค้า : <?php echo $row['warehouse_name']; ?></h4></p>
             <div class="form-group">
               <label for="names">รหัสคลังสินค้า</label>
               <input type="text" class="form-control" value="<?php echo $row['warehouse_id']; ?>" readonly>
             </div>
             <div class="form-row">
               <div class="form-group col-md-6">
                 <label for="password">ความจุคลังสินค้า</label>
                 <input type="text" class="form-control" value="<?php echo $row['warehouse_storage_full']; ?> : หน่วย" readonly>
               </div>
               <div class="form-group col-md-6">
                 <label for="mail">ถูกใช้ไปแล้ว</label>
                 <input type="text" class="form-control" value="<?php echo $row['warehouse_storage_current']; ?> : หน่วย" readonly>
               </div>
             </div>
             <div class="form-group">
               <label for="user">ที่อยู่คลังสินค้า</label>
               <textarea class="form-control" rows="3" readonly><?php echo $row['warehouse_location']; ?></textarea>
             </div>
             <div class="form-group">
               <center>
                 <label for="inputState">รูปภาพคลังสินค้า</label>
                   <div style="background-image:url('img/warehouse/w_def.jpg'); background-repeat: no-repeat; border: 2px solid #dfe6e9; border-radius: 100px; overflow: hidden; background-size: 200px 200px; width:200px; height:200px;">
                     <img src="img/warehouse/<?php echo $row['warehouse_img']; ?>" width="100%" height="100%">
                   </div>
               </center>
             </div>
         </div>
       </center>
       </div>
       <div class="card" style="width:100%; height: 30px; margin:0 0 10px 0;">
         <p class="text-center">Warehouse .inc</p>
       </div>
     </div>
    </div>
   </div>
  </div>
 </body>
</html>
