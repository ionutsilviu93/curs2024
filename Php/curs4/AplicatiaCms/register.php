<?php
require_once 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $user = new User($conn);
    if ($user->register($username, $password)) {
        echo "Utilizator înregistrat cu succes!";
    } else {
        echo "Eroare la înregistrare!";
    }
}
?>

