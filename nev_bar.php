<div id="alert_d" class="alert alert-danger" style="margin-top:50px; left:50%; transform:translate(-50%,-50%); display:none; position:fixed; z-index:10;" role="alert">Username หรือ Password ไม่ถูกต้อง กรุณา Login ใหม่อีกครั้ง</div>
<div id="alert_s" class="alert alert-success" style="margin-top:50px; left:50%; transform:translate(-50%,-50%); display:none; position:fixed; z-index:10;" role="alert">เข้าสู่ระบบสำเร็จ กำลังเคลื่อนย้าย</div>
<div id="alert_user" class="alert alert-warning" style="margin-top:50px; left:50%; color:#fff ;transform:translate(-50%,-50%); display:none; position:fixed; z-index:10;" role="alert"></div>

<nav class="navbar navbar-expand-lg navbar-light" style="background-color:#2980b9; height:60px;">
 <a class="navbar-brand text-white" href="index.php"><b>ระบบคลังสินค้า</b></a>
 <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
  <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
   <li class="nav-item"> <a class="nav-link text-white" href="product_type.php">รายการสินค้าทั้งหมด</a> </li>
   <li class="nav-item"> <a class="nav-link text-white" href="about.php">เกี่ยวกับเรา</a> </li>
  </ul>
  <form id="login_f" class="form-inline my-2 my-lg-0" method="post">
   <ul class="navbar-nav mr-auto mt-2 mt-lg-0"><li class="nav-item"><a class="nav-link text-white" href="register.php">สมัครสมาชิก</a></li></ul>
   <input class="form-control mr-sm-2" type="text" name="user" placeholder="username" />
   <input class="form-control mr-sm-2" type="password" name="pass" placeholder="password" />
   <button class="btn btn-success" type="button" onclick="login()">Login</button>
  </form>
 </div>
</nav>

<script>
  function login(){
    var result = $.ajax({
      url: "login.php",
      type: "post",
      data: $("#login_f").serialize(),
      success: function(text){
        console.log(text);
        if(text == "" || text === undefined){
          $('#alert_d').fadeIn();
          setTimeout(function(){
            $('#alert_d').fadeOut();
          },2000);
        }
        else{
          $('#alert_s').fadeIn();
          setTimeout(function(){
            $('#alert_s').fadeOut();
            window.location.href = "login/index.php";
          },2000);
        }
      }
      });
    };
</script>
