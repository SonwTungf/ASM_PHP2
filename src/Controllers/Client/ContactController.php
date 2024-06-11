<?php

namespace Pc\XUONG_OOP\Controllers\Client;

use Pc\XUONG_OOP\Commons\Controller;


class ContactController extends Controller
{
    public function index()
    {
        $name = 'Son Tung';

        $this->renderViewClient('contact', [
            'name' => $name,
        ]);
    }
}
