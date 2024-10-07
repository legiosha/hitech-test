<?php

include(__ROOT__.'/Router.php');
include(__ROOT__.'/Controllers/IndexController.php');

use App\Controllers\IndexController;
use App\Controllers\PhoneController;
use App\Router;

$router = new Router();

$router->get('/', IndexController::class, 'index');
$router->post('/phone/check', IndexController::class, 'check');

$router->dispatch();
