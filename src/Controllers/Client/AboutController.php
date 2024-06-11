<?php

namespace Pc\XUONG_OOP\Controllers\Client;

use Pc\XUONG_OOP\Commons\Controller;


class AboutController extends Controller
{
    public function index()
    {
        $name = 'Son Tung';

        $this->renderViewClient('about', [
            'name' => $name,
        ]);
    }
}
