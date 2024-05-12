<?php

class Connection {
    // Proprietăți pentru conectarea la baza de date
    private $host = "localhost";
    private $user = "root"; // Numele utilizatorului de bază de date
    private $password = ""; // Parola de bază de date
    private $database = "claseleconnectionsiuser"; // Numele bazei de date
    private $port = 3306; // Portul utilizat pentru conexiunea cu baza de date
    private $conn;

    // Constructorul clasei
    public function __construct() {
        // Conectare la baza de date la crearea obiectului
        $this->conn = new mysqli($this->host, $this->user, $this->password, $this->database, $this->port);

        // Verifică dacă există erori de conectare
        if ($this->conn->connect_error) {
            die("Conexiunea la baza de date a eșuat: " . $this->conn->connect_error);
        }
    }

    // Metoda pentru returnarea obiectului de conexiune
    public function getConnection() {
        return $this->conn;
    }
}

?>
