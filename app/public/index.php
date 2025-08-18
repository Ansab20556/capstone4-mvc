<?php
declare(strict_types=1);

session_start();
date_default_timezone_set('Asia/Aden');

require __DIR__ . '/../vendor/autoload.php';

use App\Core\Request;
use App\Core\Response;

$req = new Request();
$res = new Response();

$router = include __DIR__ . '/../app/routes.php';

$router->dispatch($req, $res);
