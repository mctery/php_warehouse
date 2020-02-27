<!DOCTYPE html>
<html lang="en" dir="ltr">
 <head>
  <meta charset="utf-8" />
  <?php require 'head.php'; ?>
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
      <div class="card bg-light text-left" style="width:60%; height: 500px; margin:10px 0 10px 0; padding:10px;">
        <p class="text-center"><h4>สมัครสมาชิก</h4></p>
        <form action="register_manage.php" id="form_insert" method="POST" enctype="multipart/form-data">
          <div class="form-group">
            <label for="names">ชื่อ - นามสกุล</label>
            <input type="text" id="names" class="form-control" name="names" placeholder="ชื่อ - นามสกุล">
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="user">Username</label>
              <input type="text" id="username" class="form-control" name="user" placeholder="Username">
            </div>
            <div class="form-group col-md-6">
              <label for="password">Password</label>
              <input type="password" id="pass" class="form-control" name="password" placeholder="Password">
            </div>
          </div>
          <div class="form-group">
            <label for="mail">E-mail</label>
            <input type="email" id="mail" class="form-control" name="mail" placeholder="E-mail">
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="tel">เบอร์โทรศัพท์</label>
              <input type="text" id="telephone" class="form-control" name="tel">
            </div>
            <div class="form-group col-md-6">
              <label for="img_file">รูปภาพ</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                </div>
                <div class="custom-file">
                  <input type="file" class="custom-file-input" name="img_file" aria-describedby="inputGroupFileAddon01">
                  <input type="hidden" id="img_file_de" name="img_file_de" value="pre_img.jpg"/>
                  <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                </div>
              </div>
            </div>
          </div>
          <button type="submit" class="btn btn-primary">สมัครสมาชิก</button>
          <button type="button" onclick="auto_register()" class="btn btn-warning">สมัครสมาชิก อัตโนมัติ 10 User</button>
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
<script>
  var count = 1;
  var set_time;

  function auto_register(){
    var username = "user";
    var password = "pass1234";
    var email = "user";
    var Telephone = "0812345678";
    var img = "img/pre_img.jpg";

    if(count <= 10){
      $('#names').val(username+"_"+count);
      $('#username').val(username+"_"+count);
      $('#pass').val(password);
      $('#mail').val(email+"_"+count+"@email.com");
      $('#telephone').val(Telephone);
      $('#img_file_de').val(img);
      $.ajax({
        url: "register_manage.php",
        type: "POST",
        data: $('#form_insert').serialize(),
        success: function(text){
          var json = JSON.parse(text);
          console.log(json.status);
          if(json.status == "1"){
            $('#alert_user').html(username+"_"+count+" Register Success");
            $('#alert_user').css('background-color','#5cb85c');
          }
          else{
            $('#alert_user').html(username+"_"+count+" Register Unsuccess");
            $('#alert_user').css('background-color','#d9534f');
          }
          $('#alert_user').fadeIn();
          setTimeout(function(){
            $('#alert_user').fadeOut();
          },1500);
          count++;
        }
      });
    }
    else{
      set_time = "";
    }
    set_time = setTimeout(function(){
      auto_register();
    },5000);
  }
</script>
