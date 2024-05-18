<?php
require_once 'config.php';
require_once 'news.php';

$news = new News($conn);
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
</head>

<body>
    <h2>Știri</h2>
    <?php foreach ($newsList as $newsItem): ?>
        <div>
            <h3><?php echo $newsItem['title']; ?></h3>
            <p><?php echo $newsItem['content']; ?></p>
            <form action="add_comment.php" method="post">
                <input type="hidden" name="news_id" value="<?php echo $newsItem['id']; ?>">
                <textarea name="comment" placeholder="Adaugă un comentariu"></textarea><br>
                <input type="submit" value="Adaugă comentariu">
            </form>
            <hr>
        </div>
    <?php endforeach; ?>
</body>

</html>