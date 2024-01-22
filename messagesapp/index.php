<?php
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
        $this->db = new mysqli($this->servername, $this->username, $this->password, $this->dbname, $this->port);
        $this->db->set_charset($this->charset);
        $this->db->options(MYSQLI_OPT_INT_AND_FLOAT_NATIVE, 1);
        if ($this->db->connect_error) {
            die("Ошибка соединения: " . $this->db->connect_error);
        }
        echo "Соединение успешно";
    }

    public function getMessages() {
        $sql = "SELECT * FROM messages";
        $result = $this->db->query($sql);

        $rows = array();
        while($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }

        return $rows;
    }

    public function closeConnection() {
        $this->db->close();
    }
}

class ViewMessages {
    private $messages;

    public function __construct($messages) {
        $this->messages = $messages;
    }

    public function renderTemplate() {
        include('view_messages.php');
    }
}



$db = new Database();
$messages = $db->getMessages();

$view = new ViewMessages(['results' => $messages]);
$view->renderTemplate();

$db->closeConnection();
?>

