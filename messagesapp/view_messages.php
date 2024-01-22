<!DOCTYPE html>
<html>
<head>
    <title>Сообщения</title>
</head>
<body>
    <h1>Список сообщений</h1>
    <ul>
        <?php foreach ($results as $message): ?>
            <li>
                <strong><?= $message['title'] ?></strong>: <?= $message['text'] ?>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
