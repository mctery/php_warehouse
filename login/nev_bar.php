<?php
  if(isset($_SESSION['member_username']) == ""){
    header("location:protected_url.php");
    exit();
  }
  setcookie("logout","logout_expire",time()+10);
?>

<div id="alert_d" class="alert alert-danger" style="margin-top:50px; left:50%; transform:translate(-50%,-50%); display:none; position:fixed; z-index:10;" role="alert">กำลังออกจากระบบ...</div>
<div id="alert_logout" class="alert alert-warning" style="margin-top:50px; left:50%; transform:translate(-50%,-50%); display:none; position:fixed; z-index:10;" role="alert">ไม่มีการตอบสนองเป็นเวลานาน</div>

<nav class="navbar navbar-expand-lg navbar-light" style="background-color:#2980b9; height:60px;">
 <a class="navbar-brand text-white" href="index.php"><b>ระบบคลังสินค้า</b></a>
 <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
  <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
   <li class="nav-item"> <a class="nav-link text-white" href="product_type.php">รายการสินค้าทั้งหมด</a> </li>
   <li class="nav-item"> <a class="nav-link text-white" href="add_product.php">นำเข้าสินค้า</a> </li>
   <li class="nav-item"> <a class="nav-link text-white" href="add_product_type.php">เพิ่มประเภทสินค้า</a> </li>
   <li class="nav-item"> <a class="nav-link text-white" href="add_warehouse.php">เพิ่มคลังสินค้า</a> </li>
   <li class="nav-item"> <a class="nav-link text-white" href="add_orders.php">จัดการ</a> </li>
  </ul>
  <form class="form-inline my-2 my-lg-0" method="post">
   <ul class="navbar-nav mr-auto mt-2 mt-lg-0"><li class="nav-item"><a class="nav-link text-white"><img src="../img/member/<?php echo $_SESSION['member_img']; ?>" width="50" class="rounded" alt="<?php echo $_SESSION['member_username']; ?>"></a></li></ul>
   <ul class="navbar-nav mr-auto mt-2 mt-lg-0"><li class="nav-item"><a class="nav-link text-white">สวัสดี : <?php echo $_SESSION['member_name']; ?></a></li></ul>
   <button class="btn btn-danger" type="button" onclick="logout()">ออกจากระบบ</button>
  </form>
 </div>
</nav>
<script>
  $(document).ready(function(){
    auto_logout();
  });
  function auto_logout(){
    $.ajax({
      url: "logout_auto.php",
      success: function(text){
        var json = JSON.parse(text);
        console.log(json.status);
        if(json.status == "1"){
          setTimeout(function(){
            auto_logout();
          },5000);
        }
        else{
          $("#alert_logout").fadeIn();
          setTimeout(function(){
            $("#alert_logout").html("กำลังออกจากระบบ...");
            setTimeout(function(){
              window.location.href = "logout.php";
            },3000);
          },3000);
        }
      }
    });
  }

  function logout(){
    $("#alert_d").fadeIn();
    setTimeout(function() {
      $("#alert_d").fadeOut();
      window.location.href = "logout.php";
    },2000);
  }
</script>
