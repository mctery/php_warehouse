<?php
require 'connect.php';
if(isset($_REQUEST['p_names'])&&isset($_REQUEST['p_price'])&&isset($_REQUEST['p_qty'])&&isset($_REQUEST['p_type'])&&isset($_REQUEST['p_detail'])&&isset($_REQUEST['p_warehouse'])&&isset($_FILES['p_img'])&&isset($_REQUEST['p_zone'])){
    $date = date("d_m_Y_his").".jpg";
    $sql_check = "INSERT INTO `product`(`product_id`, `product_name`, `product_detail`, `product_type_id`, `product_price`, `product_qty`, `product_img`, `warehouse_id`, `zone_id`)
                  VALUES (NULL,'{$_REQUEST['p_names']}','{$_REQUEST['p_detail']}','{$_REQUEST['p_type']}','{$_REQUEST['p_price']}','{$_REQUEST['p_qty']}','{$date}','{$_REQUEST['p_warehouse']}','{$_REQUEST['p_zone']}')";
    $sql_warehouse_row = "SELECT * FROM `warehouse` WHERE warehouse_id = '{$_REQUEST['p_warehouse']}'";
    $query_sql_warehouse_row = mysqli_query($connect,$sql_warehouse_row);
    $row_w = $query_sql_warehouse_row->fetch_assoc();
    $row_st = $row_w['warehouse_storage_current'];

    if($row_st > '0' && $row_st - $_REQUEST['p_qty'] >= '0'){
          $q_cal = ($row_st - $_REQUEST['p_qty']);
          if($q_cal < 0){
            echo "เพิ่มสินค้าไม่สำเร็จ";
            header('refresh: 3;url=add_product.php');
          }
          else{
            $sql_warehouse = "UPDATE `warehouse` SET warehouse_storage_current = '{$q_cal}' WHERE warehouse_id = '{$_REQUEST['p_warehouse']}'";
            //echo $sql_warehouse;
            $query_sql_warehouse = mysqli_query($connect,$sql_warehouse);
            if($query_sql_warehouse){
              $query = mysqli_query($connect,$sql_check);
              if ($query) {
                copy($_FILES['p_img']['tmp_name'],"../img/product/".$date);
                echo "เพิ่มสินค้าสำเร็จ";
                header('refresh: 3;url=add_product.php');
              }
              else {
                echo "เพิ่มสินค้าไม่สำเร็จ";
                header('refresh: 3;url=add_product.php');
              }
          }
        }
        else {
          echo "เพิ่มสินค้าไม่สำเร็จ";
          header('refresh: 3;url=add_product.php');
        }
      }
      else{
        echo "เพิ่มสินค้าไม่สำเร็จ คลังสินค้าเต็ม";
        header('refresh: 3;url=add_product.php');
      }
    }
    else {
      echo "เพิ่มสินค้าไม่สำเร็จ";
      header('refresh: 3;url=add_product.php');
    }
?>
