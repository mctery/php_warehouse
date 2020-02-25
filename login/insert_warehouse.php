<?php
require 'connect.php';
if(isset($_REQUEST['w_names'])&&isset($_REQUEST['w_location'])&&isset($_FILES['w_img'])){
  $date = date("d_m_Y_his").".jpg";
  $sql_warehouse = "INSERT INTO `warehouse`(`warehouse_id`, `warehouse_name`, `warehouse_location`, `warehouse_storage_full`, `warehouse_storage_current`, `warehouse_img`)
                    VALUES (NULL,'{$_REQUEST['w_names']}','{$_REQUEST['w_location']}','{$_REQUEST['w_storage']}','0','{$date}')";
  $query = mysqli_query($connect,$sql_warehouse);
  if ($query) {
    copy($_FILES['w_img']['tmp_name'],"../img/warehouse/".$date);
    //header('location:add_product.php');
    echo "เพิ่มคลังสินค้าสำเร็จ";
    header('refresh: 3;url=add_warehouse.php');
  }
  else {
    echo "เพิ่มคลังสินค้าไม่สำเร็จ";
    header('refresh: 3;url=add_warehouse.php');
  }
 }
else{
  echo "เพิ่มคลังสินค้าไม่สำเร็จ";
  header('refresh: 3;url=add_warehouse.php');
}
 ?>
