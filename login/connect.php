<?php
  $host = "localhost";
  $username = "mctery";
  $password = "ORJFQSe246mGh8U0";
  $database = "php_warehouse";
  $connect = new mysqli($host,$username,$password,$database);
  $connect -> set_charset("utf8");
  if($connect->connect_errno){
    echo "Cannot Connect to Database";
    exit();
  }
?>
