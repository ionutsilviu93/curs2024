<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = htmlspecialchars(trim($_POST['username']));
    $password = $_POST['password'];
    $users_file = 'users.json';
    $users_json = file_get_contents($users_file);
    $users = json_decode($users_json, true);
    $user_found = false;
    foreach ($users as $user) {
        if ($user['username'] === $username) {
            $user_found = true;
            if (password_verify($password, $user['password_hash'])) {
                echo "Autentificare reușită!";
            } else {
                echo "Parola incorectă!";
            }
            break;
        }
    }

    if (!$user_found) {
        echo "Utilizatorul nu există!";
    }
}
?>