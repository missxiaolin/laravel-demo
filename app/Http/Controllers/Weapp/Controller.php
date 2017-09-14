<?php

namespace App\Http\Controllers\Weapp;

use App\Http\Controllers\Controller as BaseController;

class Controller extends BaseController
{
    protected $title = '';

    protected function view($view, $data = [])
    {
        $data = array_merge(
            array(
                'debug' => config('page.debug'),
                'title' => $this->title,
                'host' => config('page.host'),
            ),
            $data
        );
        return view($view, $data);
    }

}
