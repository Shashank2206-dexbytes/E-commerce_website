<?php
require "Admin_connection.php"; // Assuming this file contains your database connection details
include "../Controller/Classes/db_connection.php";
include "../Controller/Classes/ProductClass.php";

$obj = new Database();

$condition_arr = array(
    'product_id' => 78, // Use => to assign values to keys
    
);

$result = $obj->deleteData('product', $condition_arr);




?>