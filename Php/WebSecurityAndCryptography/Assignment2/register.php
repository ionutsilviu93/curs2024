<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = htmlspecialchars(trim($_POST['username'])); 
    $password = $_POST['password']; 

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $users_file = 'users.json';
    if (file_exists($users_file)) {
        $users_json = file_get_contents($users_file);
        $users = json_decode($users_json, true);
    } else {
        $users = [];
    }

    foreach ($users as $user) {
        if ($user['username'] === $username) {
            echo "Acest username este deja folosit!";
            exit;
        }
    }

    $users[] = [
        'username' => $username,
        'password_hash' => $hashed_password
    ];

    file_put_contents($users_file, json_encode($users, JSON_PRETTY_PRINT));

    echo "Înregistrare reușită!";
}
?>
