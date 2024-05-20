<?php
session_start();
require_once 'config.php';
require_once 'news.php';
require_once 'user.php';

$news = new News($conn);
$user = new User($conn);
$newsList = $news->getNews();

if (!is_array($newsList)) {
    $newsList = [];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Știri</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <h1>Știri</h1>

        <?php if ($user->is_logged_in()): ?>
            <p>Bine ai venit, <?php echo $_SESSION['username']; ?>! <a href="logout.php">Logout</a></p>
        <?php else: ?>
            <a href="login.php" class="btn">Login</a>
            <a href="register.php" class="btn">Register</a>
        <?php endif; ?>

        <?php foreach ($newsList as $newsItem): ?>
            <div>
                <h3><?php echo $newsItem['title']; ?></h3>
                <p><?php echo $newsItem['content']; ?></p>

                <?php if ($user->is_logged_in()): ?>
                    <form action="add_comment.php" method="post">
                        <input type="hidden" name="news_id" value="<?php echo $newsItem['id']; ?>">
                        <textarea name="comment" placeholder="Adaugă un comentariu"></textarea><br>
                        <input type="submit" value="Adaugă comentariu" class="btn">
                    </form>
                <?php endif; ?>

                <h4>Comentarii:</h4>
                <?php
                $comments = $news->getComments($newsItem['id']);
                foreach ($comments as $comment): ?>
                    <p><strong><?php echo $comment['username']; ?>:</strong> <?php echo $comment['comment']; ?></p>
                <?php endforeach; ?>

                <hr>
            </div>
        <?php endforeach; ?>
    </div>
</body>

</html>