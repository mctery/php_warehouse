<?php
require 'connect.php';
if(isset($_REQUEST['o_type_name'])&&isset($_REQUEST['o_qty'])&&isset($_REQUEST['o_price'])&&isset($_REQUEST['o_name'])&&isset($_REQUEST['o_member'])){
    $sql_check = "INSERT INTO `orders`(`orders_id`, `orders_type_id`, `orders_qty`, `orders_price`, `order_update`, `product_id`, `order_user_submit`)
                VALUES (NULL,'{$_REQUEST['o_type_name']}','{$_REQUEST['o_qty']}','{$_REQUEST['o_price']}',NULL,'{$_REQUEST['o_name']}','{$_REQUEST['o_member']}')";
 $query = mysqli_query($connect,$sql_check);
  if ($query) {
    echo "เพิ่มสำเร็จ";
    header('refresh: 3;url=add_orders.php');
  }
  else {
    echo "เพิ่มไม่สำเร็จ";
    header('refresh: 3;url=add_orders.php');
  }
  }
else{
  echo "เพิ่มไม่สำเร็จ";
  header('refresh: 3;url=add_orders.php');
}
 ?>
