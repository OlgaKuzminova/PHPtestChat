<?php

use App\Controller\ViewMessageController;
use App\Controller\MessageListController;
use App\Controller\EditMessageController;

$request = $_SERVER['REQUEST_URI'];


$routes = [   

    '/message/edit/(\d+)' => 'EditMessageController@edit', 
    '/message/update/(\d+)' => 'EditMessageController@update',
    '/message/(\d+)' => 'ViewMessageController@view',
    '/add-comment/(\d+)' => 'CommentController@addComment', 
    '/add-message' => 'NewMessageController@showAddMessageView',  
    '/submit-message' => 'NewMessageController@addMessage', 
    '/([0-9]+)' => 'MessageListController@index',
    '/' => 'MessageListController@index',
];
$route = rtrim($request);

$routeMatched = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $postData = $_POST;

    foreach ($routes as $routePattern => $action) {


        if (preg_match('#^' . $routePattern . '$#', $request, $matches)) {

            if (isset($matches[1])) {
                $messageId = $matches[1];
            }
            
            $routeMatched = true;
            $controllerClass = explode('@', $action)[0];

            $method = explode('@', $action)[1];

            $controller = 'App\\Controller\\' . $controllerClass;
            $controllerInstance = new $controller();
            $controllerInstance->$method($messageId ?? null, $postData);
            break;
        }
    }


} elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {

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
}

if (!$routeMatched) {
    http_response_code(404);
    echo '404 - Not Found';
}

?>
