<?php
use App\Core\Router;
use App\Core\Request;
use App\Core\Response;
use App\Controllers\AuthController;
use App\Controllers\UserController;

$router = new Router();

$router->add('GET', '/login', function($req, $res){ (new AuthController($req, $res))->showLogin(); });
$router->add('POST', '/login', function($req, $res){ (new AuthController($req, $res))->login(); });
$router->add('GET', '/logout', function($req, $res){ (new AuthController($req, $res))->logout(); });

$router->add('GET', '/users', function($req, $res){ (new UserController($req, $res))->index(); });

return $router;
