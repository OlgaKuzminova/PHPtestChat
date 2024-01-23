<?php

require_once './models/database.php';
require_once './controllers/view_messages_controller.php';

use \messagesapp\Database;
use \messagesapp\ViewMessages;



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

