<!DOCTYPE html>
<html>
<head>
	<meta charset="utf8">
    <title>Список сообщений</title>
</head>
<body>
    <h1>Список сообщений</h1>
    <ul>
        <?php foreach ($result as $message): ?>
            <li>
                <h3><?= $message['title'] ?></h3>
                <p><?= $message['summary'] ?></p>
                <a href="index.php?action=viewMessage&id=<?= $message['id'] ?>">Просмотреть сообщение</a>
            </li>
        <?php endforeach; ?>
    </ul>

</body>
</html>
