<?php
namespace App\Controller;

use App\Model\MessageModel;
use App\View\View;

class MessageListController {

    public function index($pageNumber=1) {
        $perPage = 10;
        $messageModel = new MessageModel();
        $messages = $messageModel->getMessages($pageNumber, $perPage);
        print_r($messages);
        $totalMessages = $messageModel->getTotalMessagesCount(); 
        $data = [
            'messages' => $messages,
            'totalMessages' => $totalMessages,
            'perPage' => $perPage,
            'currentPage' => $pageNumber
        ];
        
        $view = new View('message-list');
        $view->setData($data);
        $view->render($data);
    }
}
?>