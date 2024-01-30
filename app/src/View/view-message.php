<!DOCTYPE html>
<html>
<head>
    <title>Просмотр сообщения</title>
</head>
<body>
    <h1>Просмотр сообщения</h1>
    <h2><?php echo $this->data['message']['title']; ?></h2>
    <p><?php echo $this->data['message']['full_content']; ?></p>

    <h3>Комментарии:</h3>
    <?php foreach ($this->data['comments'] as $comment) : ?>
        <div>
            <p>Автор: <?php echo $comment['author']; ?></p>
            <p>Текст: <?php echo $comment['comment_text']; ?></p>
        </div>
    <?php endforeach; ?>

    <a href="/message/edit/<?php echo $this->data['message']['message_id']; ?>">Редактировать сообщение</a>

    <h3>Добавить комментарий:</h3>
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
