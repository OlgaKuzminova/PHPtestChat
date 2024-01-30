<!DOCTYPE html>
<html>
<head>
    <title>Редактирование сообщения</title>
</head>
<body>
    <h1>Редактирование сообщения</h1>
    <form action="/message/update/<?php echo $this->data['message']['message_id']; ?>" method="post">
    <?php echo $this->data['message']['message_id']; ?> 
        <label for="title">Заголовок:</label><br>
        <input type="text" id="title" name="title" value="<?php echo $this->data['message']['title']; ?>"><br>
        <label for="full_content">Содержание:</label><br>
        <textarea id="full_content" name="full_content"><?php echo $this->data['message']['full_content']; ?></textarea><br>
        <input type="submit" value="Обновить сообщение">
    </form>
</body>
</html>
