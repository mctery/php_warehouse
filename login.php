<?php
require 'connect.php';

if(isset($_REQUEST['user'])&&isset($_REQUEST['pass'])){
  $sql_check = "SELECT * FROM `member` WHERE 	member_username = '{$_REQUEST['user']}' AND member_password = '{$_REQUEST['pass']}'";
  $query = mysqli_query($connect,$sql_check);
  if ($query -> num_rows > 0) {
    while ($row = $query->fetch_assoc()) {
      $array_r[] = $row;
      $_SESSION['member_id'] = $row['member_id'];
      $_SESSION['member_username'] = $row['member_username'];
      $_SESSION['member_name'] = $row['member_name'];
      $_SESSION['member_password'] = $row['member_password'];
      $_SESSION['member_email'] = $row['member_email'];
      $_SESSION['member_telephone'] = $row['member_telephone'];
      $_SESSION['member_img'] = $row['member_img'];
    }
    echo json_encode($array_r);
  }
}
 ?>
