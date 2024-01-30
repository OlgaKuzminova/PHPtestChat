<!DOCTYPE html>
<html>
<head>
    <title>Сообщения</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h1>Список сообщений</h1>
    <ul>
        <?php 
        foreach ($this->data['messages'] as $message) {
            echo "<li><a href='/message/" . $message['message_id'] . "'>" . $message['title'] . "</a>: " . $message['brief_content'] . "</li>";
        }
        ?>
    </ul>
    <a href="/add-message">Добавить сообщение</a> 
    <div class="pagination">
        <?php
        $totalPages = ceil($this->data['totalMessages'] / $this->data['perPage']);
        $currentPage = $this->data['currentPage'];
        if ($currentPage > 1) {
            echo "<a href='/1'>Первая</a>";
            echo "<a href='/".($currentPage - 1)."'>Предыдущая</a>";
        }
        for ($i = max(1, $currentPage - 3); $i <= min($currentPage + 3, $totalPages); $i++) {
            echo "<a href='/".$i."'>".$i."</a>";
        }
        if ($currentPage < $totalPages) {
            echo "<a href='/".($currentPage + 1)."'>Следующая</a>";
            echo "<a href='/".$totalPages."'>Последняя</a>";
        }
        ?>
    </div>
</body>
</html>
