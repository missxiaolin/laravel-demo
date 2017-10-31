<?php
namespace Huifang\Web\Http\Controllers;


class HomeController extends BaseController
{
    public function index()
    {
        $this->title = '首页';
        $this->file_css = 'css/index/index';
        $this->file_js = 'pages/index/index';
        return $this->view('home.index');
    }

}
