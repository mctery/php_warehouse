<div class="col-2 bg-light">
  <br>
  <h7><b>คลังสินค้า</b></h7>
    <?php
      $query_sql_warehouse = mysqli_query($connect,$sql_warehouse);
      while ($row = $query_sql_warehouse->fetch_assoc()) { ?>
          <a class="nav-link text-secondary" href="warehouse_manage.php?w_id=<?php echo $row['warehouse_id'];?>"><?php echo $row['warehouse_name']; ?></a>
        <?php } ?>
      <br>
  <h7><b>ประเภทสินค้า</b></h7>
  <?php
    $query_sql_product_type = mysqli_query($connect,$sql_product_type);
    while ($row = $query_sql_product_type->fetch_assoc()) { ?>
        <a class="nav-link text-secondary" href="product_type.php?p_id=<?php echo $row['product_type_id']; ?>"><?php echo $row['product_type_name']; ?></a>
      <?php } ?>
    <br>
  <h7><b>ประเภทรายการ</b></h7>
  <?php
    $query_sql_orders_type = mysqli_query($connect,$sql_orders_type);
    while ($row = $query_sql_orders_type->fetch_assoc()) { ?>
        <a class="nav-link text-secondary" href="orders_type.php?o_id=<?php echo $row['orders_type_id']; ?>"><?php echo $row['orders_type_name']; ?></a>
      <?php } ?>
    <br>
</div>
