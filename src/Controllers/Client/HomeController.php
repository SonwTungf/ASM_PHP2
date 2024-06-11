<?php

namespace Pc\XUONG_OOP\Controllers\Client;

use Pc\XUONG_OOP\Commons\Controller;
use Pc\XUONG_OOP\Commons\Helper;
use Pc\XUONG_OOP\Models\Product;


class HomeController extends Controller
{
    private Product $product;

    public function __construct()
    {
        $this->product = new Product();
    }

    public function index()
    {
        
        $name = 'Son Tung';

        $products = $this->product->all();

        $this->renderViewClient('home', [
            'name' => $name,
            'products' => $products

        ]);
    }
}
