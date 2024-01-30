<!DOCTYPE html>
<html>
<head>
    <title>Добавление сообщения</title>
    <link rel="stylesheet" type="text/css" href="/app/assets/style.css">
</head>
<body>
    <h1>Добавление сообщения</h1>
    <form method="post" action="/submit-message">
        <label for="title">Заголовок:</label>
        <input type="text" id="title" name="title">
        <br>
        <label for="author">Автор:</label>
        <input type="text" id="author" name="author">
        <br>
        <label for="brief_content">Краткое содержание:</label>
        <textarea id="brief_content" name="brief_content"></textarea>
        <br>
        <label for="full_content">Полное содержание:</label>
        <textarea id="full_content" name="full_content"></textarea>
        <br>
        <input type="submit" value="Добавить сообщение">
    </form>
</body>
</html>
