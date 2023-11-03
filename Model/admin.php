<?php

include 'Admin_connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['Adminemail'];
    $password = $_POST['Adminpassword'];
    $iv = '1234567890123456';
 
    $encryptionKey = 'okdenjfjeidjfjlskjenfeiejfjmssn';
    $encryptedPassword = openssl_encrypt($password, 'aes-256-cbc', $encryptionKey, 0, $iv);

    $user = new User($email, $encryptedPassword);

    $query = "SELECT * FROM admin_login WHERE admin_email='" . $user->getEmail() . "' AND admin_password='" . $user->getPassword() . "'";
    $result = $database->executeQuery($query);

    if ($result) {
        if ($result->num_rows == 1) {
            session_start();
            $_SESSION['Admin_information']=$_POST['Adminemail'];
            header("Location: Dashboard.php");
            exit;
            
        } else {
            echo '<script>
                   document.addEventListener("DOMContentLoaded",function(){
                        document.getElementById("note").innerHTML="Invalid Credentails";

                   });
                  </script>';
        }
    } else {
        echo 'Query execution failed.';
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/Modern_Ecommerce_website/View/css/styling.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />
    
    <title>Admin Login</title>

</head>
<style>
    .error{
        color: red;
        width: 100%;
    }
  
</style>
<body>

<div class="login-container">
    <form class="login-form" method="POST" id="validation">
        <img src="/Modern_Ecommerce_website/Resources/images/user/form-user.png" alt="logo" id="adminlogo" height="100px" width="100px">
        <!-- <h2 id="heading">Admin Login</h2> -->
        
        
        <div class="input-container">
            <label for="email">Email <span>*</span></label>
            <input type="email" id="email" name="Adminemail" placeholder="Enter your Email" >
        
            
        </div>
        <div class="input-container">
            <label for="password">Password <span>*</span></label>
            <input type="password" id="password" name="Adminpassword" placeholder="Enter your Password" required>
            
            
        </div>
        <div id="note" style="color:red"></div>
        <button id="submitbtn" type="submit" name="AdminLogin">Login</button>
    </form>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.js"></script>
<!-- <script src="script.js"></script> -->
<script>
   $('#validation').validate({
    rules:{
        Adminemail: {
            required: true,
        },
        Adminpassword:{
         required:true,
         minlength:8,
         regx:true,
        },
        
    },
    messages:{
        Adminemail: {
            required: 'Please enter Email',
         
        },
        Adminpassword:{
         required:"Please enter password",
         minlength:"Password is equal to 8 or more",
         regx:"(alphanumeric with one special character, one upper case)",
        },
        

    },
    
    
});

jQuery.validator.addMethod("regx", function(value, element) {
    if (/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/.test(value))
     {
      return true;
    } 
    else 
    {
      return false;
    };
  } );

</script>


</body>
</html>




           