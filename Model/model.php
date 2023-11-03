<?php 

include "../Controller/Classes/db_connection.php";
if (isset($_GET['category_id'])) {
    $aa = $_GET['category_id'];
    echo $return = $aa;
}
