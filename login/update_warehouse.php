<?php
require 'connect.php';
if(isset($_REQUEST['w_id'])){
  $date = date("d_m_Y_his").".jpg";
  $sql_warehouse = "UPDATE `warehouse` SET `warehouse_name`='{$_REQUEST['w_name']}',`warehouse_location`='{$_REQUEST['w_location']}',`warehouse_storage_full`='{$_REQUEST['w_storage_full']}',`warehouse_storage_current`='{$_REQUEST['w_storage_current']}',`warehouse_img`='{$date}'
                    WHERE warehouse_id = '{$_REQUEST['w_id']}'";
  $query = mysqli_query($connect,$sql_warehouse);
  if ($query) {
    copy($_FILES['w_img']['tmp_name'],"../img/warehouse/".$date);
    //header('location:add_product.php');
    echo "แก้ไขคลังสินค้าสำเร็จ";
    header("refresh: 3;url=warehouse_manage.php?w_id=".$_REQUEST['w_id']);
  }
  else {
    echo "แก้ไขคลังสินค้าไม่สำเร็จ";
    header("refresh: 3;url=warehouse_manage.php?w_id=".$_REQUEST['w_id']);
  }
 }
else{
  echo "แก้ไขคลังสินค้าไม่สำเร็จ";
  header("refresh: 3;url=warehouse_manage.php?w_id=".$_REQUEST['w_id']);
}
 ?>
