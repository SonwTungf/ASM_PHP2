<?php

//website có các trang 
// trang chủ 
// giới thiệu 
// sản phẩm 
// chi tiết sản phẩm 
// liên hệ 

// để định nghĩa được ,điều đầu tiên làm là phải tạo controllers
//tiếp theo khia báo function tướng ứng để xử lý 
// bước cuối , định nghĩa đường dẫn 

// HTPP Method : get, post,put,delete 


use Pc\XUONG_OOP\Controllers\Client\OrderController;
use Pc\XUONG_OOP\Controllers\Client\ProductController;
use Pc\XUONG_OOP\Controllers\Client\AboutController;
use Pc\XUONG_OOP\Controllers\Client\CartController;
use Pc\XUONG_OOP\Controllers\Client\ContactController;
use Pc\XUONG_OOP\Controllers\Client\HomeController;
use Pc\XUONG_OOP\Controllers\Client\LoginController;


$router->get('/',                  HomeController::class       . '@index');
$router->get('/about',             AboutController::class      . '@index');

$router->get('contact',           ContactController::class    . '@index');
$router->post('contact/store',    ContactController::class    . '@store');

$router->get('products',          ProductController::class    . '@index');
$router->get('products/{id}',     ProductController::class    . '@detail');

$router->get('login',             LoginController::class    . '@showFormLogin');
$router->post('handle-login',     LoginController::class    . '@login');
$router->get('logout',            LoginController::class    . '@logout');

$router->get('cart/add',           CartController::class . '@add');
$router->get('cart/quantityInc',   CartController::class . '@quantityInc');
$router->get('cart/quantityDec',   CartController::class . '@quantityDec');
$router->get('cart/remove',        CartController::class . '@remove');
$router->get('cart/detail',        CartController::class . '@detail');

$router->post('oder/checkout',      OrderController::class . '@checkout');
