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
  $sql_warehouse_id = "SELECT * FROM `warehouse` WHERE warehouse_id = '{$_REQUEST['w_id']}'";
  $sql_product_type = "SELECT * FROM `product_type`";
  $sql_orders_type = "SELECT * FROM `orders_type`";
 ?>
 <body>
  <div class="container-fluid">
    <div id="alert_s" class="alert alert-success" style="margin-top:50px; left:50%; transform:translate(-50%,-50%); display:none; position:fixed; z-index:10;" role="alert">ลบคลังสินค้าเรียบร้อย...</div>
    <?php require 'nev_bar.php';?>
    <div class="row">
     <?php require 'side_bar.php';?>
     <div class="col-lg">
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
       <?php }
          $query_w_id = mysqli_query($connect,$sql_warehouse_id);
          $row = $query_w_id->fetch_assoc();
        ?>
       </div>
       <hr>
       <div class="card bg-light" style="width:100%; height: auto; margin:0 0 10px 0;">
         <center>
        <form id="warehouse_f" name="warehouse_f" action="update_warehouse.php" method="post" enctype="multipart/form-data">
         <div class="card bg-light text-left" style="width:60%; height: auto; margin:10px 0 10px 0; padding:10px;">
           <p class="text-center"><h4>คลังสินค้า : <?php echo $row['warehouse_name']; ?></h4></p>
             <div class="form-group">
               <label for="names">รหัสคลังสินค้า</label>
               <input type="text" id="w_id" name="w_id" class="form-control" readonly value="<?php echo $row['warehouse_id']; ?>">
             </div>
             <div class="form-group">
               <label for="names">ชื่อคลังสินค้า</label>
               <input type="text" name="w_name" class="form-control" value="<?php echo $row['warehouse_name']; ?>">
             </div>
             <div class="form-row">
               <div class="form-group col-md-6">
                 <label for="password">ความจุคลังสินค้า</label>
                 <div class="input-group mb-3">
                  <input type="number" class="form-control" name="w_storage_full" value="<?php echo $row['warehouse_storage_full']; ?>">
                  <div class="input-group-append">
                    <span class="input-group-text">: หน่วย</span>
                  </div>
                </div>
               </div>
               <div class="form-group col-md-6">
                 <label for="mail">ถูกใช้ไปแล้ว</label>
                 <div class="input-group mb-3">
                  <input type="number" class="form-control" name="w_storage_current" value="<?php echo $row['warehouse_storage_current']; ?>">
                  <div class="input-group-append">
                    <span class="input-group-text">: หน่วย</span>
                  </div>
                </div>
               </div>
             </div>
             <div class="form-group">
               <label for="user">ที่อยู่คลังสินค้า</label>
               <textarea class="form-control" name="w_location" rows="3"><?php echo $row['warehouse_location']; ?></textarea>
             </div>
             <div class="form-row">
               <div class="form-group col-md-6">
                 <center>
                   <label for="inputState">รูปภาพคลังสินค้า</label>
                     <div style="background-image:url('../img/warehouse/w_def.jpg'); background-repeat: no-repeat; border: 2px solid #dfe6e9; border-radius: 100px; overflow: hidden; background-size: 200px 200px; width:200px; height:200px;">
                       <img src="../img/warehouse/<?php echo $row['warehouse_img']; ?>" id="load_img" width="100%" height="100%">
                     </div>
                 </center>
               </div>
               <div class="form-group col-md-6">
                   <label for="img_file">อัพโหลดรูปภาพคลังสินค้า</label>
                   <input type="file" id="img_file" name="w_img" onchange="document.getElementById('load_img').src = window.URL.createObjectURL(this.files[0]);">
               </div>
             </div>
               <div class="form-group">
                 <button class="btn btn-success" type="submit">แก้ไข</button>
                 <button class="btn btn-danger" type="button" onclick="delete_warehouse()">ลบคลัง</button>
               </div>
             </div>
       </form>
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
