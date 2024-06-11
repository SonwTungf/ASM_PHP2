<?php

namespace Pc\XUONG_OOP\Controllers\Admin;

use Pc\XUONG_OOP\Commons\Controller;
class DashboardController extends Controller
{

    public function index()
    {
        $this->renderViewAdmin('dashboard');
    }


}
