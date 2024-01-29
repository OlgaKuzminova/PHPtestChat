<?php

use App\Controller\MessageController;
use App\Controller\MessageListController;

$request = $_SERVER['REQUEST_URI'];
echo "<pre>" . print_r($_SERVER, true) . "</pre>";

$routes = [
    '/' => 'MessageListController@index',
    '/([0-9]+)' => 'MessageListController@index',
    '/message/([\d]+)' => 'ViewMessageController@view',
    '/message/edit/([0-9]+)' => 'EditMessageController@edit', 
    '/message/update/([0-9]+)' => 'EditMessageController@update',
];

$route = rtrim($request);
print_r($route);


$routeMatched = false;
foreach ($routes as $routePattern => $action) {
    if (preg_match('#^' . $routePattern . '$#', $request, $matches)) {
        $routeMatched = true;
        array_shift($matches); 
        $controllerClass = explode('@', $action)[0];
        $method = explode('@', $action)[1];
        
        $controller = 'App\\Controller\\' . $controllerClass;
        $controllerInstance = new $controller();
        $controllerInstance->$method(...$matches); 
        break;
    }
}

if (!$routeMatched) {
    http_response_code(404);
    echo '404 - Not Found';
}
?>
