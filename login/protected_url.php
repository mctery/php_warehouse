<!DOCTYPE html>
<html lang="en" dir="ltr">
 <head>
  <meta charset="utf-8" />
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css" />
  <link rel="stylesheet" href="../import_css/main.css" />
  <script src="../bootstrap/js/jquery-3.4.1.min.js"></script>
  <script src="../bootstrap/js/popper.min.js"></script>
  <script src="../bootstrap/js/bootstrap.min.js"></script>
 </head>
 <body>
  <div class="container-fluid">
   <div id="alert_unlogin" class="alert alert-danger" style="margin-top:50px; left:50%; transform:translate(-50%,-50%); display:block; position:fixed; z-index:10;" role="alert">โปรด Login ก่อนเข้าใช้ระบบ...</div>
   <script>
     $(document).ready(function(){
       setTimeout(function(){
         $("#alert_unlogin").html("กำลังออกจากระบบ...");
         setTimeout(function(){
           window.location.href = "logout.php";
         },3000);
       },3000);
     });
   </script>
  </div>
 </body>
</html>
