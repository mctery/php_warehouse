<?php
require 'connect.php';
if(isset($_REQUEST['p_names'])&&isset($_REQUEST['p_price'])&&isset($_REQUEST['p_qty'])&&isset($_REQUEST['p_type'])&&isset($_REQUEST['p_detail'])&&isset($_REQUEST['p_warehouse'])&&isset($_FILES['p_img'])&&isset($_REQUEST['p_zone'])){
  $date = date("d_m_Y_his").".jpg";
  $sql_check = "INSERT INTO `product`(`product_id`, `product_name`, `product_detail`, `product_type_id`, `product_price`, `product_qty`, `product_img`, `warehouse_id`, `zone_id`)
                VALUES (NULL,'{$_REQUEST['p_names']}','{$_REQUEST['p_detail']}','{$_REQUEST['p_type']}','{$_REQUEST['p_price']}','{$_REQUEST['p_qty']}','{$date}','{$_REQUEST['p_warehouse']}','{$_REQUEST['p_zone']}')";
  $query = mysqli_query($connect,$sql_check);
  if ($query) {
    copy($_FILES['p_img']['tmp_name'],"../img/product/".$date);
  }
  else {
    
  }
}
else{
  header('location:add_product_ss.php');
}
 ?>
