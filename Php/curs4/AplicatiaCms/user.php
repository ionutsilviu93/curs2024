<?php
class User
{
    private $conn;

    public function __construct($db_conn)
    {
        $this->conn = $db_conn;
    }

    public function register($username, $password)
    {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $this->conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
        $stmt->bind_param("ss", $username, $hashed_password);
        return $stmt->execute();
    }

    public function login($username, $password)
    {
        $stmt = $this->conn->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            if (password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['role'] = $user['role'];
                return true;
            }
        }
        return false;
    }

    public function is_logged_in()
    {
        return isset($_SESSION['user_id']);
    }

    public function is_admin()
    {
        return isset($_SESSION['role']) && $_SESSION['role'] === 'admin';
    }
}
?>