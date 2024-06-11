<?php

namespace Pc\XUONG_OOP\Controllers\Admin;

use Pc\XUONG_OOP\Commons\Controller;
use Pc\XUONG_OOP\Commons\Helper;
use Pc\XUONG_OOP\Models\categories;
use Pc\XUONG_OOP\Models\Product;
use Rakit\Validation\Rules\Url;
use Rakit\Validation\Validator;

class ProductController extends Controller
{
    private Product $product;
    private categories $categories;


    public function __construct()
    {
        $this->product = new product();
        $this->categories = new categories();
    }

    public function index()
    {
        [$products, $totalPage] = $this->product->paginate($_GET['page'] ?? 1);
        $totalRecords = $this->product->countAll();

        $this->renderViewAdmin('products.index', [
            'products' => $products,
            'totalPage' => $totalPage,
            'totalRecords' => $totalRecords
        ]);
    }

    public function create()
    {
        $categories = $this->categories->all();
        $categories = array_column($categories, 'name', 'id');

        $this->renderViewAdmin('products.' . __FUNCTION__, [
            'categories' => $categories
        ]);
    }

    public function store()
    {
        Helper::debug($_POST + $_FILES);
        $validator = new Validator;
        $validation = $validator->make($_POST + $_FILES, [
            'category_id' => 'required|', // Đặt quy tắc cụ thể cho category_id
            'name' => 'required|max:255',
            'price_regular' => 'required|max:255',
            'price_sale' => 'max:255', // Thêm quy tắc cho price_sale nếu cần
            'img_thumbnail' => 'uploaded_file:0,2M,png,jpg,jpeg',
        ]);

        $validation->validate();

        if ($validation->fails()) {
            $_SESSION['errors'] = $validation->errors()->firstOfAll();
            header('Location: ' . url('admin/products'));
            exit;
        } else {
            $data = [
                'category_id' => $_POST['category_id'],
                'name' => $_POST['name'],
                'price_regular' => $_POST['price_regular'],
                'price_sale' => $_POST['price_sale'],
            ];

            if (isset($_FILES['img_thumbnail']) && $_FILES['img_thumbnail']['size'] > 0) {
                $from = $_FILES['img_thumbnail']['tmp_name'];
                $to = 'assets/uploads/' . time() . $_FILES['img_thumbnail']['name'];

                if (move_uploaded_file($from, PATH_ROOT . $to)) {
                    $data['img_thumbnail'] = $to;
                } else {
                    $_SESSION['errors']['img_thumbnail'] = 'Upload không thành công';
                    header('Location: ' . url('admin/products'));
                    exit;
                }
            }

            // Lưu dữ liệu vào cơ sở dữ liệu tại đây
            // Ví dụ: Product::create($data);
        }
    }


    public function show($id)
    {
        $product = $this->product->findByID($id);

        $this->renderViewAdmin('products.show', [
            'product' => $product
        ]);
    }

    public function edit($id)
    {
        $categories = $this->categories->all();
        $categories = array_column($categories, 'name', 'id');
        $product = $this->product->findByID($id);
        
      

        $this->renderViewAdmin('products.edit', [
            'product' => $product,
            'categories' => $categories
        ]);
    }

    public function update($id)
    {
        $product = $this->product->findByID($id);

        $validator = new Validator;
        $validation = $validator->make($_POST + $_FILES, [
            'name'                  => 'required|max:200',
            'price_regular'         => 'required|max:50',
            'price_sale'            => 'min:6',
            'category_id'           => 'required|',
            'img_thumbnail'         => 'uploaded_file:0,2M,png,jpg,jpeg',
        ]);
        $validation->validate();

        if ($validation->fails()) {
            $_SESSION['errors'] = $validation->errors()->firstOfAll();

            header('Location: ' . url("admin/products/{$product['id']}/edit"));
            exit;
        } else {
            $data = [
                'name'              => $_POST['name'],
                'price_regular'     => $_POST['price_regular'],
                'price_sale'        => $_POST['price_sale'],
                'category_id'       => $_POST['category_id'],
            ];

            $flagUpload = false;
            if (isset($_FILES['img_thumbnail']) && $_FILES['img_thumbnail']['size'] > 0) {

                $flagUpload = true;

                $from = $_FILES['img_thumbnail']['tmp_name'];
                $to = 'assets/uploads/' . time() . $_FILES['img_thumbnail']['name'];

                if (move_uploaded_file($from, PATH_ROOT . $to)) {
                    $data['img_thumbnail'] = $to;
                } else {
                    $_SESSION['errors']['img_thumbnail'] = 'Upload Không thành công';

                    header('Location: ' . url("admin/products/{$product['id']}/edit"));
                    exit;
                }
            }

            $this->product->update($id, $data);

            if (
                $flagUpload
                && $product['img_thumbnail']
                && file_exists(PATH_ROOT . $product['img_thumbnail'])
            ) {
                unlink(PATH_ROOT . $product['img_thumbnail']);
            }

            $_SESSION['status'] = true;
            $_SESSION['msg'] = 'Thao tác thành công';

            header('Location: ' . url("admin/products/{$product['id']}/edit"));
            exit;
        }
    }

    public function delete($id)
    { {
            $product = $this->product->findByID($id);

            $this->product->delete($id);

            header('Location: ' . url('admin/products'));
            exit();
        }
    }
}
