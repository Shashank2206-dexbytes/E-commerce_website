<?php 

include "db_connection.php";
if(isset($_GET('category_id')))
        {
            $aa=$_POST['category_id'];
            echo $return=$aa;
        }
?>