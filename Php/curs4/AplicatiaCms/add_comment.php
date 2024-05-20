<?php
session_start();
require_once 'config.php';
require_once 'news.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_SESSION['user_id'])) {
        $userId = $_SESSION['user_id'];
        $newsId = $_POST['news_id'];
        $comment = $_POST['comment'];

        $news = new News($conn);
        if ($news->addComment($userId, $newsId, $comment)) {
            header("Location: index.php");
            exit();
        } else {
            echo "Eroare la adăugarea comentariului.";
        }
    } else {
        header("Location: login.php");
        exit();
    }
}
?>