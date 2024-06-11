<?php

namespace Pc\XUONG_OOP\Controllers\Client;

use Pc\XUONG_OOP\Commons\Controller;
use Pc\XUONG_OOP\Models\Product;

class ProductController extends Controller
{
    private Product $product;

    public function __construct()
    {
        $this->product = new Product();
    }

    public function index()
    {
        {
            $name = 'Son Tung';
    
            // $products = $this->product->all();

            $page = $_GET['page'] ?? 1;
            [$products, $totalPage] = $this->product->paginate($page, 6);
    
            return $this->renderViewClient('product', [
                'name' => $name,
                'products' => $products,
                'totalPage' => $totalPage,
                'page' => $page
            ]);
        }
    }

    public function detail($id)
    {
        $product = $this->product->findByID($id);

        $this->renderViewClient('product-detail', [
            'product' => $product
        ]);
    }
}
