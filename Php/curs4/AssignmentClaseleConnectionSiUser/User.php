<?php

class User
{
    // Proprietăți pentru utilizator
    private $conn;

    // Constructorul clasei
    public function __construct($db)
    {
        $this->conn = $db;
    }

    // Metoda pentru adăugarea unui utilizator nou
    public function addUser($firstName, $lastName, $email, $password, $birthday, $status)
    {
        // Prepare the SQL query
        $sql = "INSERT INTO users (first_name, last_name, email, password, birthday, status) 
            VALUES (?, ?, ?, ?, ?, ?)";

        // Prepare the statement
        $stmt = $this->conn->prepare($sql);

        // Bind the parameters
        $stmt->bind_param("sssssi", $firstName, $lastName, $email, $password, $birthday, $status);

        // Execute the statement
        if ($stmt->execute()) {
            return true; // Return true if the user is added successfully
        } else {
            return false; // Return false if there is an error
        }
    }

    // Metoda care returnează toate datele utilizatorului
    public function getUserData($userId)
    {
        // Prepare the SQL query
        $sql = "SELECT * FROM users WHERE id = ?";

        // Prepare the statement
        $stmt = $this->conn->prepare($sql);

        // Bind the parameter
        $stmt->bind_param("i", $userId);

        // Execute the statement
        $stmt->execute();

        // Get the result
        $result = $stmt->get_result();

        // Fetch the user data
        $userData = $result->fetch_assoc();

        // Return the user data
        return $userData;
    }

    // Metoda care returnează prenumele și numele utilizatorului
    public function getFullName($userId)
    {
        // Get the user data
        $userData = $this->getUserData($userId);

        // Check if the user data exists
        if ($userData) {
            // Return the full name
            return $userData['first_name'] . ' ' . $userData['last_name'];
        } else {
            return null; // Return null if the user data doesn't exist
        }
    }

    // Metoda care returnează adresa de email a utilizatorului
    public function getEmail($userId)
    {
        // Get the user data
        $userData = $this->getUserData($userId);

        // Check if the user data exists
        if ($userData) {
            // Return the email
            return $userData['email'];
        } else {
            return null; // Return null if the user data doesn't exist
        }
    }

    // Metoda care returnează ID-ul utilizatorului
    public function getUserId($email)
    {
        // Prepare the SQL query
        $sql = "SELECT id FROM users WHERE email = ?";

        // Prepare the statement
        $stmt = $this->conn->prepare($sql);

        // Bind the parameter
        $stmt->bind_param("s", $email);

        // Execute the statement
        $stmt->execute();

        // Get the result
        $result = $stmt->get_result();

        // Fetch the user ID
        $userId = $result->fetch_assoc();

        // Return the user ID
        return $userId;
    }

    // Metoda care returnează o valoare booleană în funcție de faptul dacă utilizatorul este adult sau minor
    public function isAdult($userId)
    {
        // Get the user data
        $userData = $this->getUserData($userId);

        // Check if the user data exists
        if ($userData) {
            // Calculate the user's age based on the birthday
            $birthday = new DateTime($userData['birthday']);
            $today = new DateTime();
            $age = $today->diff($birthday)->y;

            // Return true if the user is an adult (age >= 18)
            return $age >= 18;
        } else {
            return null; // Return null if the user data doesn't exist
        }
    }

    // Metoda care editează un utilizator existent utilizând parametrii metodei
    public function editUser($userId, $firstName, $lastName, $email, $password, $birthday, $status)
    {
        // Prepare the SQL query
        $sql = "UPDATE users SET first_name = ?, last_name = ?, email = ?, password = ?, birthday = ?, status = ? WHERE id = ?";

        // Prepare the statement
        $stmt = $this->conn->prepare($sql);

        // Bind the parameters
        $stmt->bind_param("sssssii", $firstName, $lastName, $email, $password, $birthday, $status, $userId);

        // Execute the statement
        if ($stmt->execute()) {
            return true; // Return true if the user is updated successfully
        } else {
            return false; // Return false if there is an error
        }
    }

    // Metoda care schimbă starea unui utilizator existent utilizând parametrii metodei
    public function changeUserStatus($userId, $newStatus)
    {
        // Prepare the SQL query
        $sql = "UPDATE users SET status = ? WHERE id = ?";

        // Prepare the statement
        $stmt = $this->conn->prepare($sql);

        // Bind the parameters
        $stmt->bind_param("ii", $newStatus, $userId);

        // Execute the statement
        if ($stmt->execute()) {
            return true; // Return true if the user status is changed successfully
        } else {
            return false; // Return false if there is an error
        }
    }

    // Metoda care returnează orice date de la utilizator folosind parametrii metodei
    public function getUserByCriteria($criteria)
    {
        // Prepare the SQL query
        $sql = "SELECT * FROM users WHERE ";
        $conditions = array();
        foreach ($criteria as $key => $value) {
            $conditions[] = "$key = ?";
        }
        $sql .= implode(" AND ", $conditions);

        // Prepare the statement
        $stmt = $this->conn->prepare($sql);

        // Bind the parameters
        $types = str_repeat("s", count($criteria)); // Assuming all values are strings for simplicity
        $stmt->bind_param($types, ...array_values($criteria));

        // Execute the statement
        $stmt->execute();

        // Get the result
        $result = $stmt->get_result();

        // Fetch the user data
        $userData = $result->fetch_assoc();

        // Return the user data
        return $userData;
    }
}

?>
