<?php
  require_once "connect.php";
  //header("Content-Type:application/json");

  $_FILES['img_file']['tmp_name'];
  $file_name = $_POST['user'].date("Y_m_d").".jpg";

 $sql = "INSERT INTO `member`(`member_id`, `member_name`, `member_username`, `member_password`, `member_email`, `member_telephone`, `member_img`)".
 "VALUES (null,'{$_POST['names']}','{$_POST['user']}','{$_POST['password']}','{$_POST['mail']}','{$_POST['tel']}','{$file_name}')";

  $query = mysqli_query($connect,$sql);
  if($query){
    //json_encode(array('status' => 1,'message' => 'Recode add successfully'));
    copy($_FILES['img_file']['tmp_name'],"img/member/".$file_name);
  }
  else {
    //json_encode(array('status' => 0,'message' => 'Recode add unsuccessfully'));
  }

?>
