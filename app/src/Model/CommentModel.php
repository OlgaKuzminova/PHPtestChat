<?php
namespace App\Model;

class CommentModel {

    private $db;

    public function __construct() {
        $mysql = "mysql:host=" . DB_HOST . ";dbname=" . DB_DATABASE . ";port=3306;charset=utf8;unix_socket=/var/run/mysqld/mysqld.sock";

        $this->db = new \PDO($mysql, DB_USERNAME, DB_PASSWORD);
    }

    public function getCommentsByMessageId($messageId) {
        $sql = "SELECT * FROM comments WHERE message_id = :messageId";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':messageId', $messageId, \PDO::PARAM_INT);
        $stmt->execute();
        $comments = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $comments;
    }

    public function createComment($messageId, $author, $commentText) {
        $sql = "INSERT INTO comments (message_id, author, comment_text) VALUES (:messageId, :author, :commentText)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':messageId', $messageId, \PDO::PARAM_INT);
        $stmt->bindParam(':author', $author, \PDO::PARAM_STR);
        $stmt->bindParam(':commentText', $commentText, \PDO::PARAM_STR);
        $stmt->execute();
    }

    public function deleteComments($message_id) {
        $sql = "DELETE FROM comments WHERE message_id = :message_id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':message_id', $message_id, \PDO::PARAM_INT);
        $stmt->execute();
    }


}
