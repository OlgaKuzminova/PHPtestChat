<?php
namespace App\Controller;

use App\Model\MessageModel;
use App\View\View;

class ViewMessageController {

    public function view($messageId) {
        $messageModel = new MessageModel();
        $message = $messageModel->getMessageById($messageId);

        if ($message) {
            $view = new View('view-message');
            $view->setData(['message' => $message]);
            $view->render();
        } else {
            echo "Сообщение не найдено.";
        }
    }
}
?>
