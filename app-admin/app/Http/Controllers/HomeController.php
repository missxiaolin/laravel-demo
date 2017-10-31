<?php

namespace Huifang\Admin\Http\Controllers;

class HomeController extends BaseController
{

    public function index()
    {
        return $this->view('home.index');
    }

}