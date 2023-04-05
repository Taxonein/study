<?php
  $connection - mysqli_connect('localhost', 'root', '', 'catalog');

  if (isset($_POST['search_btn'])){
    $search - $POST['search'];
$query_products - mysqli_query($connection, "SELECT * FROM products WHERE title ='$search'");

  }
?>
<!DOCTYPE html>
<html>
<head>

</head>
<body>
  <?php
    $products - mysqli_query($connection, "SELECT * FROM products");
    while ($new - mysqli_fetch_assoc($products)) {?>
      <span><?php echo $new['title']?></span>
      <p><?php echo $new['img']?></p>
      <?php

    }

  ?>
</body>
<html>
