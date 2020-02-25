<?php
require 'connect.php';
if(isset($_REQUEST['p_id'])){
  $date = date("d_m_Y_his").".jpg";
  $sql_pro = "UPDATE `product` SET `product_id`= '{$_REQUEST['p_id']}',`product_name`= '{$_REQUEST['p_names']}',`product_detail`= '{$_REQUEST['p_detail']}',
                    `product_type_id`= '{$_REQUEST['p_type']}',`product_price`= '{$_REQUEST['p_price']}',`product_qty`= '{$_REQUEST['p_qty']}',
                    `product_img`= '{$date}',`product_update`= NULL,`warehouse_id`= '{$_REQUEST['p_warehouse']}',`zone_id`= '{$_REQUEST['p_zone']}'
                    WHERE product_id = '{$_REQUEST['p_id']}'";
  $query = mysqli_query($connect,$sql_pro);
  if ($query) {
    copy($_FILES['p_img']['tmp_name'],"../img/product/".$date);
    //header('location:add_product.php');
    echo "แก้ไขสินค้าสำเร็จ";
    header("refresh: 3;url=product_manage.php?p_id=".$_REQUEST['p_id']);
  }
  else {
    echo "แก้ไขสินค้าไม่สำเร็จ";
    header("refresh: 3;url=product_manage.php?p_id=".$_REQUEST['p_id']);
  }
 }
else{
  echo "แก้ไขสินค้าไม่สำเร็จ";
  header("refresh: 3;url=product_manage.php?p_id=".$_REQUEST['p_id']);
}
 ?>
