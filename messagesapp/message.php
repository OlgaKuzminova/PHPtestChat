<?php

//require('view_messages.php');



$servername = "mysql";
$username = "docker";
$password = "123";
$dbname = "docker";
$port     = 3306;
$charset  = 'utf8mb4';



mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$db = new mysqli($servername, $username, $password, $dbname, $port);
$db->set_charset($charset);
$db->options(MYSQLI_OPT_INT_AND_FLOAT_NATIVE, 1);
if ($db->connect_error) {
  die("Ошибка соединения: " . $db->connect_error);
}
echo "Соединение успешно ";



// Получение идентификатора сообщения из GET-параметров
if(isset($_GET['id'])) {
    $messageId = $_GET['id'];

    // Выполнение запроса к базе данных для получения конкретного сообщения
    $sql = "SELECT * FROM messages WHERE id = $messageId";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Вывод сообщения
        $row = $result->fetch_assoc();
        echo "Заголовок: " . $row['title'] . "<br>";
        echo "Текст: " . $row['text'];
    } else {
        echo "Сообщение не найдено";
    }
} else {
    echo "Неверные параметры запроса";
}
$db->close();



?>
