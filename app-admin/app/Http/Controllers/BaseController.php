<?php

namespace Huifang\Admin\Http\Controllers;

class BaseController extends Controller
{
    protected function view($view, $data = array())
    {
        $data = array_merge(
            [
                'meta_title' => '房圈后台信息管理系统',
                'meta_keyword' => '房圈后台信息管理系统',
                'meta_description' => '房圈后台信息管理系统',
            ],
            $data
        );
        return view($view, $data);
    }

}