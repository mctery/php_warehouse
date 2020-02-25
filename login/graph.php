<?php
  require 'connect.php';
  $sql_type = "SELECT * FROM `product_type`";
  $sql_import_product = "SELECT product_type.product_type_name as 'type',sum(orders.orders_qty) as 'qty' FROM orders,product,product_type where orders.product_id = product.product_id AND orders_type_id = '006' AND product_type.product_type_id = product.product_type_id GROUP BY product_type.product_type_id ASC";
  $sql_export_product = "SELECT product_type.product_type_name as 'type',sum(orders.orders_qty) as 'qty' FROM orders,product,product_type where orders.product_id = product.product_id AND orders_type_id = '007' AND product_type.product_type_id = product.product_type_id GROUP BY product_type.product_type_id ASC";

  $import; $export;
  $query_import = mysqli_query($connect,$sql_import_product);
  while ($row_import = $query_import->fetch_assoc()) {
     $import[] = array('data' => $row_import);
  }
  $query_export = mysqli_query($connect,$sql_export_product);
  while ($row_export = $query_export->fetch_assoc()) {
    $export[] = array('data' => $row_export);
  }
  echo json_encode(array('import' => $import,'export' => $export));
?>
