<?php
echo 'роут подключён';
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH); // Получаем только путь из запроса

$url = $_SERVER['REQUEST_URI'];
if (strpos($url, '/view_message.php?id=') !== false) {
    $id = substr($url, strpos($url, 'id=') + 3);
    echo 'работает';
} elseif ($path === '/message') {
    
} elseif ($path === '/add-message') {
}
    
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
       
    } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
        
   
} else {
    http_response_code(404);
    echo 'внутри роута';
}
?>
