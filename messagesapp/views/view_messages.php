<!DOCTYPE html>
<html>
<head>
    <title>Сообщения</title>
</head>
<body>
    <h1>Список сообщений</h1>
    <ul>
			   <?php 
		foreach ($this->messages['messages'] as $message) {
			echo $message['title'] . ": " . $message['brief_content'] . "<br>";
		}
		?>

    </ul>
    <div>

    <?php
    $totalPages = ceil($this->messages['totalMessages'] / $this->messages['perPage']);
    $currentPage = $this->messages['currentPage'];
    if ($currentPage > 1) {
        echo "<a href='?page=1'>Первая</a>";
        echo "<a href='?page=".($currentPage - 1)."'>Предыдущая</a>";
    }
    for ($i = max(1, $currentPage - 3); $i <= min($currentPage + 3, $totalPages); $i++) {
        echo "<a href='?page=".$i."'>".$i."</a>";
    }
    if ($currentPage < $totalPages) {
        echo "<a href='?page=".($currentPage + 1)."'>Следующая</a>";
        echo "<a href='?page=".$totalPages."'>Последняя</a>";
    }
    ?>
</div>
</body>
</html>
