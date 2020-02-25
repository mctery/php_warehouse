<?php
 require 'connect.php';
 $sql_warehouse_delete = "DELETE FROM `warehouse` WHERE warehouse_id = '{$_REQUEST['w_id']}'";
 $query_sql = mysqli_query($connect,$sql_warehouse_delete);
?>
