<!DOCTYPE html>
<html>
<head>
    <title>Редактирование сообщения</title>
</head>
<body>
    <h1>Редактирование сообщения</h1>
    <form action="/message/update/<?php echo $this->data['message']['id']; ?>" method="post">
        <label for="title">Заголовок:</label><br>
        <input type="text" id="title" name="title" value="<?php echo $this->data['message']['title']; ?>"><br>
        <label for="content">Содержание:</label><br>
        <textarea id="content" name="content"><?php echo $this->data['message']['content']; ?></textarea><br>
        <input type="submit" value="Обновить сообщение">
    </form>
</body>
</html>
