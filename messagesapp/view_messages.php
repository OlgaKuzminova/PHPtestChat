<!DOCTYPE html>
<html>
<head>
    <title>Сообщения</title>
</head>
<body>
    <h1>Список сообщений</h1>
    <ul>
			   <?php 
		foreach ($this->messages['results'] as $message) {
			echo $message['title'] . ": " . $message['full_content'] . "<br>";
		}
		?>

    </ul>
    <div>
    <a href="?page=1">1</a>
    <a href="?page=2">2</a>
    
</div>
</body>
</html>
