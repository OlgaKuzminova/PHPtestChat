<?php
namespace messagesapp;
class ViewMessages {
    private $messages;

    public function __construct($messages) {
        $this->messages = $messages;
    }

    public function renderTemplate() {
        include(__DIR__ . '/../view/message_list.php');
    }
    
}
?>