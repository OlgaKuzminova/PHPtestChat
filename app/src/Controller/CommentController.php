<?php
namespace App\Controller;

use App\Model\CommentModel;
use App\View\View;

class CommentController {

    public function addComment($messageId, $postData) {
        $commentModel = new CommentModel();
        $commentModel->createComment($messageId, $postData['author'], $postData['comment_text']);
        header('Location: /message/' . $messageId);
        exit();
    }

}
?>
