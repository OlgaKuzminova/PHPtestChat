<?php
namespace App\Controller;

use App\Model\CommentModel;
use App\Model\MessageModel;

class DeleteMessageAndRelatedController
{
    public function deleteMessageAndRelated($messageId)
    {
        $commentModel = new CommentModel();
        $commentModel->deleteComments($messageId);

        $messageModel = new MessageModel();
        $messageModel->deleteMessage($messageId);

        header('Location: /');
        exit();
    }
}
