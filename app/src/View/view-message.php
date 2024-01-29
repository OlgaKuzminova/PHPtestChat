<!DOCTYPE html>
<html>
<head>
    <title>Просмотр сообщения</title>
</head>
<body>
    <h1>Просмотр сообщения</h1>
    <h2><?php echo $this->data['message']['title']; ?></h2>
    <p><?php echo $this->data['message']['full_content']; ?></p>
    <a href="/message/edit/<?php echo $this->data['message']['message_id']; ?>">Редактировать сообщение</a>
</body>
</html>
