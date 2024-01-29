<?php
namespace App\Controller;

use App\Model\MessageModel;
use App\View\View;

class EditMessageController {

    public function edit($messageId) {
        $messageModel = new MessageModel();
        $message = $messageModel->getMessageById($messageId);
        $view = new View('edit-message');
        $view->setData(['message' => $message]);
        $view->render();
    }
    
    public function update($messageId) {
        // Обработка данных из формы для обновления сообщения
        // После обновления перенаправление на страницу просмотра сообщения
    }
}
