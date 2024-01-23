<?php

require_once './model/database.php';


use \messagesapp\Database;

class ViewMessages {
    private $messages;

    public function __construct($messages) {
        $this->messages = $messages;
    }

    public function renderTemplate() {
        include('./view/view_messages.php');
    }
}



$db = new Database();
$perPage = 10;
$page = isset($_GET['page']) ? max(1, intval($_GET['page'])) : 1; 
$messages = $db->getMessages($page, $perPage);
$totalMessages = count($messages);
$results = array('messages' => $messages, 'totalMessages' => $totalMessages, 'perPage' => $perPage, 'currentPage' => $page);



$view = new ViewMessages($results);
$view->renderTemplate();

$db->closeConnection();

?>

