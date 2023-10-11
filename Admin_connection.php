

<?php
class Database {
    private $conn;

    public function __construct($servername, $username, $password, $dbname) 
    {
        $this->conn = new mysqli($servername, $username, $password, $dbname);

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function executeQuery($query) {
        return $this->conn->query($query);
    }

   

    
}

class User {
    private $email;
    private $password;

    public function __construct($email, $password)
     {
        $this->email = $email;
        $this->password = $password;
    }

    public function getEmail() 
    {
        return $this->email;
    }

    public function getPassword() 
    {
        return $this->password;
    }
}
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'admin_details';

$database = new Database($servername, $username, $password, $dbname);

?>


