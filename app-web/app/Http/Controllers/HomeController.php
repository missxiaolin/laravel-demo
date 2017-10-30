<?php
namespace Huifang\Web\Http\Controllers;


class HomeController extends BaseController
{
    public function index()
    {
        return $this->view('home.index');
    }

}
