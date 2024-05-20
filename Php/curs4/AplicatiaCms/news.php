<?php
class News
{
    private $conn;

    public function __construct($db_conn)
    {
        $this->conn = $db_conn;
    }

    public function getNews()
    {
        $sql = "SELECT * FROM news";
        $result = $this->conn->query($sql);

        $newsList = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $newsList[] = $row;
            }
        }
        return $newsList;
    }

    public function addComment($userId, $newsId, $comment)
    {
        $sql = "INSERT INTO comments (user_id, news_id, comment) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("iis", $userId, $newsId, $comment);
        return $stmt->execute();
    }

    public function getComments($newsId)
    {
        $sql = "SELECT c.*, u.username FROM comments c JOIN users u ON c.user_id = u.id WHERE c.news_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $newsId);
        $stmt->execute();
        $result = $stmt->get_result();

        $commentsList = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $commentsList[] = $row;
            }
        }
        return $commentsList;
    }
}
?>