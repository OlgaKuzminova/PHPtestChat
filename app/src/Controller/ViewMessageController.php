<?php
namespace App\Controller;

use App\Model\MessageModel;
use App\Model\CommentModel;
use App\View\View;


class ViewMessageController {

    public function view($messageId) {
        $messageModel = new MessageModel();
        $message = $messageModel->getMessageById($messageId);
        $commentModel = new CommentModel();
        $comments = $commentModel->getCommentsByMessageId($messageId);

        if ($message) {
            $view = new View('view-message');
            $view->setData(['message' => $message, 'comments' => $comments]);
            $view->render();
        } else {
            echo "Сообщение не найдено.";
        }
    }
}
?>
