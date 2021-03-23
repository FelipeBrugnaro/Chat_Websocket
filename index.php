<?php
session_start();
use App\Page;
use App\Controllers\{
    LoginController
};

require __DIR__."/vendor/autoload.php";



$slimConfig = ['settings' => [
    'displayErrorDetails' => true
]];

$app = new \Slim\App($slimConfig);
$container = $app->getContainer();



$app->get('/login', function ($request, $response, $args){
    $page = new Page();
    $page->setTpl('login');
});


$app->get('/sair', LoginController::class . ':logout');

$app->post('/login', LoginController::class . ':login');


$app->get('/', function($request, $response, $args){
    $page = new Page();
    $page->setTpl('chat', array(
        'username' => $_SESSION['username']
));

})->add(function($request, $response, $next){
    if($_SESSION['username'] ?? false){
        $response = $next($request, $response);
    } else {
        return $response->withStatus(302)->withHeader('Location', './login');
    }
    return $response;
});


$app->run();