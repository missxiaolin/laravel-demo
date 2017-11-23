<?php
namespace Huifang\Web\Http\Controllers;

use Illuminate\Http\Request;


class HomeController extends BaseController
{
    public function index()
    {
        $this->title = '首页';
        $this->file_css = 'css/index/index';
        $this->file_js = 'pages/index/index';
        return $this->view('home.index');
    }

    /**
     * 文件上传
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function upload(Request $request)
    {
        if ($request->isMethod('post')) {
            dump($request->all()['img']);
            $file = $request->file('img');
            if ($file->isValid()) {
                // 原文件名字
                $originalName = $file->getClientOriginalName();
                // 扩展名
                $ext = $file->getClientOriginalExtension();
                // 文件类型
                $type = $file->getClientMimeType();
                // 临时文件绝对路径
                $realPath = $file->getRealPath();

                $fileName = date('Y-m-d-H-i-s') . '-' . uniqid() . '.' . $ext;

                $bool = Storage::disk('uploads')->put($fileName, file_get_contents($realPath));

            }
        }
        return $this->view('weapp.index.upload');
    }

}
