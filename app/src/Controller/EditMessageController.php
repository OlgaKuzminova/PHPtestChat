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
        if (isset($_POST['title']) && isset($_POST['full_content'])) {
            echo 'зашел в условие метода апдейт';
            $newTitle = $_POST['title'];
            var_dump($newTitle);
            $newContent = $_POST['full_content'];
            var_dump($newContent);
            var_dump($messageId);
            $messageModel = new MessageModel();
            $success = $messageModel->updateMessage($messageId, $newTitle, $newContent);

            if ($success) {
                header('Location: /message/'.$messageId);
                exit();
            } else {
                echo "Произошла ошибка при обновлении сообщения. Пожалуйста, попробуйте снова.";
            }
        } else {
            echo "Ошибка: данные из формы не были получены для обновления сообщения.";
        }
    }
    }
    