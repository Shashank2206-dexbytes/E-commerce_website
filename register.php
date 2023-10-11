<?php
include 'Admin_connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $iv = '1234567890123456';  // IV should be exactly 16 bytes long
  
    
    $encryptionKey = 'okdenjfjeidjfjlskjenfeiejfjmssn';
    $encryptedPassword = openssl_encrypt($password, 'aes-256-cbc', $encryptionKey, 0, $iv);

    $user = new User($email, $encryptedPassword);

    $query = "INSERT INTO admin_login (admin_email, admin_password) VALUES ('" . $user->getEmail() . "', '" . $user->getPassword() . "')";
    $database->executeQuery($query);

    echo 'User registered successfully!';
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
</head>
<body>
    <h2>Login</h2>
    <form method="post">
        <label>Email:</label><br>
        <input type="email" name="email"><br>
        <label>Password:</label><br>
        <input type="password" name="password"><br><br>
        <input type="submit" value="Register">
    </form>
</body>
</html>
