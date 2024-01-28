<?php
if ($DB_USERNAME && $DB_PASSWORD && $DB_DATABASE) {
    echo 'переменные загружены';
} else {
    echo 'проблема с загрузкой переменных';
}
echo 'роут подключён';
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH); // Получаем только путь из запроса

$url = $_SERVER['REQUEST_URI'];
if (strpos($url, '/view_message.php?id=') !== false) {
    $id = substr($url, strpos($url, 'id=') + 3);
    echo 'работает';
} elseif ($path === '/message') {
    echo 'работает';
} elseif ($path === '/add-message') {
}
    
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
       
    } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
        
   
} else {
    http_response_code(404);
    echo 'внутри роута';
}
?>
