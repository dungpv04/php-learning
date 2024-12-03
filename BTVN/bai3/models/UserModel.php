<?php
class UserModel
{
    private $conn;

    public function __construct()
    {
        $host = 'localhost';
        $user = 'root';
        $password = '';
        $database = 'USERS';

        $this->conn = new mysqli($host, $user, $password, $database);

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function getAllUsers()
    {
        $result = $this->conn->query("SELECT * FROM userList");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getUserById($id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM userList WHERE Id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function createUser($name, $email, $phone, $address)
    {
        $stmt = $this->conn->prepare("INSERT INTO userList (Name, Email, Phone, Address) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $name, $email, $phone, $address);
        return $stmt->execute();
    }

    public function updateUser($id, $name, $email, $phone, $address)
    {
        $stmt = $this->conn->prepare("UPDATE userList SET Name = ?, Email = ?, Phone = ?, Address = ? WHERE Id = ?");
        $stmt->bind_param("ssssi", $name, $email, $phone, $address, $id);
        return $stmt->execute();
    }

    public function deleteUser($id)
    {
        $stmt = $this->conn->prepare("DELETE FROM userList WHERE Id = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
?>
