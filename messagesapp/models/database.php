<?php
namespace messagesapp;
use mysqli;

class Database {
    private $servername = "mysql";
    private $username = "docker";
    private $password = "123";
    private $dbname = "docker";
    private $port = 3306;
    private $charset = 'utf8mb4';
    private $db;

    public function __construct() {
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        try {
            $this->db = new mysqli($this->servername, $this->username, $this->password, $this->dbname, $this->port);
            $this->db->set_charset($this->charset);
            $this->db->options(MYSQLI_OPT_INT_AND_FLOAT_NATIVE, 1);
            echo "Соединение успешно";
        } catch (mysqli_sql_exception $e) {
            throw new Exception("Ошибка соединения: " . $e->getMessage());
        }
    }

    public function getMessages($page, $perPage) {
        $offset = ($page - 1) * $perPage;
        $sql = "SELECT * FROM messages LIMIT ?, ?";
        
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("ii", $offset, $perPage);
        $stmt->execute();
        
        $result = $stmt->get_result();
        
        $rows = $result->fetch_all(MYSQLI_ASSOC);
        
        $stmt->close();
        
        return $rows;
    }

    public function closeConnection() {
        $this->db->close();
    }
}
?>
