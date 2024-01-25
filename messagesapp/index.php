<?php

require_once './models/database.php';
require_once './controllers/view_messages_controller.php';

use messagesapp\Database;
use messagesapp\ViewMessages;

$path = $_SERVER['REQUEST_URI'];
echo $path;


if (!preg_match('~^\/(\?page=(\d+))?$~', $path)) { 
    require 'routes.php';
} else {
    $db = new Database();
    $perPage = 10;
    $page = isset($_GET['page']) ? max(1, intval($_GET['page'])) : 1; 
    $messages = $db->getMessages($page, $perPage);
    $db->closeConnection();
    $totalMessages = count($messages);
    $results = array('messages' => $messages, 'totalMessages' => $totalMessages, 'perPage' => $perPage, 'currentPage' => $page);
    $view = new ViewMessages($results);
    $view->renderTemplate();
}
?>



