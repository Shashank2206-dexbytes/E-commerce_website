<?php
include "Admin_connection.php";

$category_id=$_GET['category_id'];
$status=$_GET['status'];

$q="UPDATE category set status=$status WHERE category_id=$category_id";

$result = $database->executeQuery($q);

header("Location: Category.php");
?>