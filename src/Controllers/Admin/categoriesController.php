<?php

namespace Pc\XUONG_OOP\Controllers\Admin;

use Pc\XUONG_OOP\Commons\Controller;
use Pc\XUONG_OOP\Commons\Helper;
use Pc\XUONG_OOP\Models\Categories;
use Rakit\Validation\Rules\Url;
use Rakit\Validation\Validator;


class categoriesController extends Controller
{
    private categories $categories;

    public function __construct()
    {
        $this->categories = new categories();
    }

    public function index()
    {
        [$categories, $totalPage] = $this->categories->paginate($_GET['page'] ?? 1);
        $totalRecords = $this->categories->countAll();
        $this->renderViewAdmin('categories.index', [
            'categories' => $categories,
            'totalPage' => $totalPage,
            'totalRecords' => $totalRecords
        ]);
    }

    public function create()
    {
        $this->renderViewAdmin('categories.create');
    }

    public function store()
    {


        $validator = new Validator;
        $validation = $validator->make($_POST, [
            'name'                  => 'required|max:50',
        ]);
        $validation->validate();

        if ($validation->fails()) {
            $_SESSION['errors'] = $validation->errors()->firstOfAll();
            header('Location: ' . url('admin/categories/create'));
            exit;
        } else {
            $data = [
                'name'     => $_POST['name'],
            ];
        }

        $this->categories->insert($data);

        $_SESSION['status'] = true;
        $_SESSION['msg'] = 'Thao tác thành công';

        header('Location: ' . url('admin/categories'));
        exit;
    }
    public function edit($id)
    {
        $categories = $this->categories->findByID($id);

        $this->renderViewAdmin('categories.edit', [
            'categories' => $categories
        ]);
    }

    public function update($id)
    {
        $categories = $this->categories->findByID($id);

        $validator = new Validator;
        $validation = $validator->make($_POST + $_FILES, [
            'name'                  => 'required|max:50',
        ]);
        $validation->validate();

        if ($validation->fails()) {
            $_SESSION['errors'] = $validation->errors()->firstOfAll();

            header('Location: ' . url("admin/categories/{$categories['id']}/edit"));
            exit;
        } else {
            $data = [
                'name'     => $_POST['name'],
            ];

            $this->categories->update($id, $data);

            $_SESSION['status'] = true;
            $_SESSION['msg'] = 'Thao tác thành công';

            header('Location: ' . url("admin/categories/"));
            exit;
        }
    }

    public function delete($id)
    {
        $categories = $this->categories->findByID($id);

        $this->categories->delete($id);

        if (
            $categories['avatar']
            && file_exists(PATH_ROOT . $categories['avatar'])
        ) {
            unlink(PATH_ROOT . $categories['avatar']);
        }

        header('Location: ' . url('admin/categories'));
        exit();
    }
}
