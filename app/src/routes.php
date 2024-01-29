<?php

use App\Controller\MessageController;
use App\Controller\MessageListController;
use App\Controller\EditMessageController;

$request = $_SERVER['REQUEST_URI'];
// echo "<pre>" . print_r($_SERVER, true) . "</pre>";
echo $request;
$routes = [   

    '/message/edit/(\d+)' => 'EditMessageController@edit', 
    '/message/update/(\d+)' => 'EditMessageController@update',
    '/message/(\d+)' => 'ViewMessageController@view',
    '/([0-9]+)' => 'MessageListController@index',
    
    '/' => 'MessageListController@index',
];
$route = rtrim($request);
print_r($route);
$routeMatched = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo 'метод пост';
    $postData = $_POST;
    print_r($postData);
    foreach ($routes as $routePattern => $action) {
        echo 'зашел в форич';
        print_r($routes);
        print_r($routePattern);
        echo $route;
        if (preg_match('#^' . $routePattern . '$#', $request, $matches)) {
            echo 'зашел в условие';
            echo $route;
            $routeMatched = true;
            $controllerClass = explode('@', $action)[0];
            print_r($controllerClass);
            $method = explode('@', $action)[1];
            print_r($method);
            $controller = 'App\\Controller\\' . $controllerClass;
            $controllerInstance = new $controller();
            $controllerInstance->$method($postData);
            break;
        }
    }
    print_r($postData);

} else {

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
