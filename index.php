<?php

include_once "first_part.php";
include_once "Root.php";


// FRONT COTROLLER

// 1. Общие настройки

ini_set('display_errors', 1);
error_reporting(E_ALL);

// 2. Подключение файлов системы

require_once(Root::dir().'/components/Router.php');

// 3. Установка соединения с БД


// 4. Вызор Router

$router = new Router();
$router->run();





