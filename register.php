<!DOCTYPE html>
<html lang="en" dir="ltr">
 <head>
  <meta charset="utf-8" />
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
  <script src="bootstrap/js/jquery-3.4.1.min.js"></script>
  <script src="bootstrap/js/popper.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <script src="import_js/Chart.min.js"></script>
  <script src="import_js/main.js"></script>
  <title>Warehouse</title>
 </head>
 <?php
  require 'connect.php';
  $sql_warehouse = "SELECT * FROM `warehouse`";
  $sql_product_type = "SELECT * FROM `product_type`";
  $sql_orders_type = "SELECT * FROM `orders_type`";
 ?>
 <body>
  <div class="container-fluid">

    <div class="alert alert-success" id="regis_ss" style="margin:20px auto; left:50%; transform: translate(-50,-50); display:none; position:fixed; z-index:10;" role="success">สมัครสมาชิกเรียบร้อย</div>

    <?php require 'nev_bar.php';?>
    <div class="row">
     <?php require 'side_bar.php';?>
    <div class="col-lg">
      <center>
      <div class="card bg-light text-left" style="width:60%; height: 500px; margin:10px 0 10px 0; padding:10px;">
        <p class="text-center"><h4>สมัครสมาชิก</h4></p>
        <form action="register_manage.php" method="POST" enctype="multipart/form-data">
          <div class="form-group">
            <label for="names">ชื่อ - นามสกุล</label>
            <input type="text" class="form-control" name="names" placeholder="ชื่อ - นามสกุล">
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="user">Username</label>
              <input type="text" class="form-control" name="user" placeholder="Username">
            </div>
            <div class="form-group col-md-6">
              <label for="password">Password</label>
              <input type="password" class="form-control" name="password" placeholder="Password">
            </div>
          </div>
          <div class="form-group">
            <label for="mail">E-mail</label>
            <input type="email" class="form-control" name="mail" placeholder="E-mail">
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="tel">Telephone</label>
              <input type="text" class="form-control" name="tel">
            </div>
            <div class="form-group col-md-6">
              <label for="img_file">Telephone</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                </div>
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="inputGroupFile01" name="img_file" aria-describedby="inputGroupFileAddon01">
                  <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                </div>
              </div>
            </div>
          </div>
          <button type="submit" class="btn btn-primary">สมัครสมาชิก</button>
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
