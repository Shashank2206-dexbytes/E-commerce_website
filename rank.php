<?php

?>

<?php

$servername="localhost";
$username="root";
$password="";
$dbname="admin_details";

$conn=new mysqli($servername,$username,$password,$dbname);

if($conn->connect_error)
{
    die("Connection Error".$conn->connect_error);
}


$encryptionkey=openssl_random_pseudo_bytes(16);

$emailname="Manoj@gmail.com";
$passwordname="Zera@1023";

$encryptedPasword=openssl_encrypt($passwordname,'aes-256-cbc',$encryptionkey,0,$encryptionkey);

$sql="INSERT INTO admin_login (admin_email,admin_password) VALUES ('$emailname','$encryptedPasword')";


$conn->close();
?>