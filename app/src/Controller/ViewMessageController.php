<?php
namespace App\Controller;

use App\Model\MessageModel;
use App\View\View;

class ViewMessageController {

    public function view($messageId) {
        $messageModel = new MessageModel();
        $message = $messageModel->getMessageById($messageId);

        $view = new View('view-message');
        $view->setData(['message' => $message]);
        $view->render();
    }
}
?>
