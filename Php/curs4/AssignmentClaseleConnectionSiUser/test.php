<?php
// Include fișierul Connection.php
include 'Connection.php';
include 'User.php';

// Creează un obiect Connection
$connection = new Connection();
$conn = $connection->getConnection();

// Creează un obiect User
$user = new User($conn);

// Testează metodele clasei User
$user->addUser("John", "Doe", "john@example.com", "password123", "1990-01-01", 1);
// Apelarea altor metode ale clasei User pentru teste

// Afișează rezultatele sau mesaje de confirmare
echo "Operații efectuate cu succes!";

?>
