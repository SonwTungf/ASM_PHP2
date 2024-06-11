<?php

//      GET     -> USER/INDEX   -> INDEX          -> Danh sách
//      GET     -> USER/CREATE  -> CREATE         -> HIỂN THỊ FORM THÊM MỚI
//      POST    -> USER/STORE   -> STORE          -> LƯU DỮ LIỆU TỪ FORM THÊM MỚI VÀO DB
//      GET     -> USER/ID      -> SHOW ($id)     -> XEM CHI TIẾT
//      GET     -> USER/ID/EDIT -> EDIT ($id)     -> HIỂN THỊ FORM CẬP NHẬT
//      PUT     -> USER/ID      -> UPDATE ($id)   -> LƯU DỮ LIỆU TỪ FORM CẬP NHẬT VÀO DB
//      DELETE  -> USER/ID      -> DELETE ($id)   -> XÓA BẢ

use Pc\XUONG_OOP\Controllers\Admin\categoriesController;
use Pc\XUONG_OOP\Controllers\Admin\DashboardController;
use Pc\XUONG_OOP\Controllers\Admin\UserController;
use Pc\XUONG_OOP\Controllers\Admin\ProductController;

$router->before('GET|POST', '/admin/*.*', function () {
    if (!isset($_SESSION['user'])) {
        header('location:' . url('login'));
        exit();
    }
});

$router->before('GET|POST', '/admin/*.*', function () {
    if (!isset($_SESSION['user'])) {
        header('location:' . url('login'));
        exit();
    }
});

$router->mount('/admin', function () use ($router) {
    $router->get('/', DashboardController::class . '@index');

    $router->mount('/users', function () use ($router) {
        $router->get('/',                   UserController::class .      '@index');
        $router->get('/create',             UserController::class .      '@create');
        $router->post('/store',             UserController::class .      '@store');
        $router->get('/{id}/show',          UserController::class .      '@show');
        $router->get('/{id}/edit',          UserController::class .      '@edit');
        $router->post('/{id}/update',       UserController::class .      '@update');
        $router->get('/{id}/delete',        UserController::class .      '@delete');
    });

    $router->mount('/products', function () use ($router) {
        $router->get('/',                   ProductController::class .  '@index');
        $router->get('/create',             ProductController::class .  '@create');
        $router->get('/{id}/delete',        ProductController::class .  '@delete');
        $router->post('/store',             ProductController::class .  '@store');
        $router->get('/{id}/edit',          ProductController::class .  '@edit');
        $router->get('/{id}',               ProductController::class .  '@show');
        $router->post('/{id}/update',       ProductController::class .  '@update');
    });
    $router->mount('/categories', function () use ($router) {
        $router->get('/',                  categoriesController::class .  '@index');
        $router->get('/create',            categoriesController::class .  '@create');
        $router->post('/store',            categoriesController::class .  '@store');
        $router->get('/{id}/edit',         categoriesController::class .  '@edit');
        $router->post('/{id}/update',      categoriesController::class .  '@update');
        $router->get('/{id}',              categoriesController::class .  '@show');
        $router->get('/{id}/delete',       categoriesController::class .  '@delete');
    });
});
