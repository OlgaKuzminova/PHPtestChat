<?php
namespace messagesapp;

class ViewMessageWithComments {
    private $messageId;
    private $message;
    private $comments;

    public function __construct($messageId, $message, $comments) {
        $this->messageId = $messageId;
        $this->message = $message;
        $this->comments = $comments;
    }

    public function renderTemplate() {
        include(__DIR__ . '/../views/view_message.php'); 


    }
}
?>