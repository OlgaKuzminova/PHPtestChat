<!DOCTYPE html>
<html>
<head>
    <title>Добавление комментария</title>
</head>
<body>
    <h1>Добавление комментария</h1>
    <form method="post" action="/add-comment/<?php echo $this->data['message']['message_id']; ?>">
        <label for="author">Автор:</label>
        <input type="text" id="author" name="author">
        <br>
        <label for="comment_text">Текст комментария:</label>
        <textarea id="comment_text" name="comment_text"></textarea>
        <br>
        <input type="submit" value="Добавить комментарий">
    </form>
</body>
</html>
