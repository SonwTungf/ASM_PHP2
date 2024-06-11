<?php


session_start();
require_once __DIR__ . '/vendor/autoload.php';
use Pc\XUONG_OOP\Commons\Helper;
Dotenv\Dotenv::createImmutable(__DIR__)->load();
require_once './helper.php';
require_once __DIR__ . '/routes/index.php';

