<?php

namespace App\Http\Controllers\Weapp;

use App\Http\Controllers\Controller as BaseController;

class Controller extends BaseController
{
    protected $title = '小林专属';
    protected $meta_title = '';
    protected $meta_keyword = '';
    protected $meta_description = '';
    protected $file_css = '';
    protected $file_js = '';

    public function setSeo($title, $keyword, $description)
    {
        $this->meta_title = $title;
        $this->meta_keyword = $keyword;
        $this->meta_description = $description;
    }

    protected function view($view, $data = [])
    {
        $data = array_merge(
            array(
                'debug' => config('page.debug'),
                'title' => $this->title,
                'host' => config('page.host'),
                'file_css' => $this->file_css,
                'file_js' => $this->file_js,
            ),
            $data
        );
        return view($view, $data);
    }

}
