<?php
include "Admin_connection.php";

$category_id=$_GET['product_id'];
$status=$_GET['status'];

$q="UPDATE product set status=$status WHERE product_id=$product_id";

$result = $database->executeQuery($q);

header("Location: product.php");
?>