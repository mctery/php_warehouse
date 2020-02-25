<?php
 require 'connect.php';
 $sql_warehouse_delete = "DELETE FROM `product` WHERE product_id = '{$_REQUEST['p_id']}'";
 $query_sql = mysqli_query($connect,$sql_warehouse_delete);
?>
