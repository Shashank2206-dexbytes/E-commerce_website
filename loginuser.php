
<?php
include 'demoen.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $iv = '1234567890123456';  // IV should be exactly 16 bytes long
  

    // Ensure that your encryption key and initialization vector match the ones used for registration
    $encryptionKey = 'sourabhdhanariya12354566ddjdjdj';
    $encryptedPassword = openssl_encrypt($password, 'aes-256-cbc', $encryptionKey, 0, $iv);

    $user = new User($email, $encryptedPassword);

    $query = "SELECT * FROM tb_user WHERE email='" . $user->getEmail() . "' AND password='" . $user->getPassword() . "'";
    $result = $database->executeQuery($query);

    if ($result) {
        if ($result->num_rows == 1) {
            echo 'Login successful!';
        } else {
            echo 'Login failed. Invalid email or password.';
        }
    } else {
        echo 'Query execution failed.';
    }
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
        <input type="submit" value="Login">
    </form>
</body>
</html>
