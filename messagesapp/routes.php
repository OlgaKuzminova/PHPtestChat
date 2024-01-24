<?php
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH); // Получаем только путь из запроса

if (preg_match('~^\/view_message\.php\?id=\d+$~', $path, $matches)) { 

    $id = $matches[1]; 
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
