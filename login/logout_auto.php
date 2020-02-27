<?php
  if(isset($_COOKIE['logout'])){
    echo json_encode(array("status" => "1"));
  }
  else{
    echo json_encode(array("status" => "0"));
  }
?>
