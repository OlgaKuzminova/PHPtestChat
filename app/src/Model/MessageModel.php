<?php
namespace App\Model;


class MessageModel {

    private $db;

    public function __construct() {
        $mysql = "mysql:host=" . DB_HOST . ";dbname=" . DB_DATABASE . ";port=3306;charset=utf8;unix_socket=/var/run/mysqld/mysqld.sock";

        $this->db = new \PDO($mysql, DB_USERNAME, DB_PASSWORD);
    }


    public function getMessages($page, $perPage) {
        $offset = ($page - 1) * $perPage;
        $sql = "SELECT * FROM messages LIMIT :offset, :perPage";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':offset', $offset, \PDO::PARAM_INT);
        $stmt->bindParam(':perPage', $perPage, \PDO::PARAM_INT);
        $stmt->execute();


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
        $stmt = $this->db->prepare("INSERT INTO messages (title, author, brief_content, full_content) VALUES (?, ?, ?, ?)");
        $stmt->execute([$data['title'], $data['author'], $data['brief_content'], $data['full_content']]);
    }
    

    public function updateMessage($id, $newTitle, $newContent) {
        $stmt = $this->db->prepare("UPDATE messages SET title = ?, full_content = ? WHERE message_id = ?");

        try {
            $stmt->execute([$newTitle, $newContent, $id]);

            return 'success';
        } catch (PDOException $e) {
            echo 'Ошибка при обновлении сообщения: ' . $e->getMessage();
        }
        
        
    }

    public function deleteMessage($id) {
        $stmt = $this->db->prepare("DELETE FROM messages WHERE message_id = ?");
        $stmt->execute([$id]);
    }
}


?>
