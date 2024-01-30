<?php
namespace App\Controller;

use App\View\View;
use App\Model\MessageModel;

class NewMessageController {

    public function showAddMessageView() {
        $view = new View('add-message-form');
        $view->render();
    }

    public function addMessage($messageID, $postData) {

        $messageModel = new MessageModel();
        $messageModel->createMessage($postData);

        
        header('Location: /');
        exit();
    }
}
