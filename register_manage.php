<?php
  require_once "connect.php";

  $file_name = "";
  if($_REQUEST['img_file_de']){
    $file_name = "img/pre_img.jpg";
  }
  else{
    $_FILES['img_file']['tmp_name'];
    $file_name = $_REQUEST['user'].date("Y_m_d").".jpg";
  }

$sql_check_user = "SELECT * FROM member WHERE member_username = '{$_REQUEST['user']}'";
$query_user_check = mysqli_query($connect,$sql_check_user);
if($query_user_check -> num_rows > 0){
  echo json_encode(array("status" => "0"));
  echo "<br>สมัครสมาชิกไม่สำเร็จ";
}
else{
  $sql = "INSERT INTO `member`(`member_id`, `member_name`, `member_username`, `member_password`, `member_email`, `member_telephone`, `member_img`)".
  "VALUES (null,'{$_REQUEST['names']}','{$_REQUEST['user']}','{$_REQUEST['password']}','{$_REQUEST['mail']}','{$_REQUEST['tel']}','{$file_name}')";

   $query = mysqli_query($connect,$sql);
   if($query){
     echo json_encode(array("status" => "1"));
     //echo "<br>สมัครสมาชิกสำเร็จ";
     if($_REQUEST['img_file_de'] == ""){
       copy($_FILES['img_file']['tmp_name'],"img/member/".$file_name);
       header( "refresh: 2; url=index.php" );
     }
   }
   else {
     echo json_encode(array("status" => "0"));
     //echo "<br>สมัครสมาชิกไม่สำเร็จ";
   }
}
?>
