<?php
namespace App\Model;


class MessageModel {

    private $db;

    public function __construct() {
        $mysql = "mysql:host=" . DB_HOST . ";dbname=" . DB_DATABASE . ";port=3306;charset=utf8;unix_socket=/var/run/mysqld/mysqld.sock";
        print_r($mysql);
        $this->db = new \PDO($mysql, DB_USERNAME, DB_PASSWORD);
    }


    public function getMessages($page, $perPage) {
        $offset = ($page - 1) * $perPage;
        $sql = "SELECT * FROM messages LIMIT ?, ?";
        
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(1, $offset, \PDO::PARAM_INT);
        $stmt->bindParam(2, $perPage, \PDO::PARAM_INT);

        $stmt->execute();
        
        $stmt->execute();
        $rows = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        
        $stmt->closeCursor();
        
        return $rows;
    }

    public function getTotalMessagesCount() {
        $sql = "SELECT COUNT(*) AS total FROM messages"; 
        $stmt = $this->db->query($sql);
        $result = $stmt->fetch(\PDO::FETCH_ASSOC);

        return $result['total']; 
    }

    public function getMessageById($id) {
        $stmt = $this->db->prepare("SELECT * FROM messages WHERE message_id = ?");
        $stmt->execute([$id]);
        $message = $stmt->fetch(\PDO::FETCH_ASSOC);

        return $message;
    }

    public function createMessage($data) {
        $stmt = $this->db->prepare("INSERT INTO messages (title, body) VALUES (?, ?)");
        $stmt->execute([$data['title'], $data['body']]);
    }

    public function updateMessage($id, $data) {
        $stmt = $this->db->prepare("UPDATE messages SET title = ?, body = ? WHERE id = ?");
        $stmt->execute([$data['title'], $data['body'], $id]);
    }

    public function deleteMessage($id) {
        $stmt = $this->db->prepare("DELETE FROM messages WHERE id = ?");
        $stmt->execute([$id]);
    }
}


?>
