<?php
require 'connect.php';

if(isset($_REQUEST['p_names'])){
  $sql_type = "INSERT INTO `product_type`(`product_type_id`, `product_type_name`) VALUES (NULL,'{$_REQUEST['p_names']}')";
  $query = mysqli_query($connect,$sql_type);
  if ($query) {
      echo json_encode($_REQUEST['p_names']);
  }
}
 ?>
