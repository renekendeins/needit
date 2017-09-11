<?php 

require('db_conn.php');

$product = filter_var($_POST['product'], FILTER_SANITIZE_STRING);
$group = filter_var($_POST['group'], FILTER_SANITIZE_STRING);

$query = 'UPDATE products SET Prod_Status = 0 WHERE Prod_id = :product';
$result = $base -> prepare($query);
$result -> bindValue(':product', $product);
$result -> execute();

header('location:../login/myList.php?group='.$group);




?>