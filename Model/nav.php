<?php
session_start();
if(!isset($_SESSION['Admin_information']))
{
   
    header("Location: Admin.php");
    exit;
}    
if(isset($_POST['Logout']))
{
    session_destroy();
    
    header("Location: Admin.php");
    exit;
}
?>