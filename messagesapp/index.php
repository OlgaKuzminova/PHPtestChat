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



$sql = "SELECT * FROM messages";
$result = $db->query($sql);

$rows = array();
while($row = $result->fetch_assoc()) {
    $rows[] = $row;
}

$templateData = array('results' => $rows);
$templateFile = 'view_messages.php';

include($templateFile);


if ($result->num_rows > 0) {
  
  while($row = $result->fetch_assoc()) {
    echo "Заголовок сообщения: " . $row["title"]. " - Краткое содержание: " . $row["brief_content"]. "<br>";
  }
} else {
  echo "0 результатов";
}


$db->close();



?>
