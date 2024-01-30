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
        ini_set('output_buffering', 'On');
        if (isset($_POST['title']) && isset($_POST['full_content'])) {

            $newTitle = $_POST['title'];

            $newContent = $_POST['full_content'];

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
?>