<?php

require_once './models/database.php';
require_once './controllers/view_messages_controller.php';

use messagesapp\Database;
use messagesapp\ViewMessages;

$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
echo $path;


if (!preg_match('~^\/(\?page=(\d+))?$~', $path)) {
    echo 'routes.php'; 
    require 'routes.php';
    

} elseif (preg_match('~^\/view_message\.php\?id=\d+$~', $path)) {
    echo 'вариант 2';
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



