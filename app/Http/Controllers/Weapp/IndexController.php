<?php

namespace App\Http\Controllers\Weapp;

use App\Jobs\SMS\sms;
use App\Libs\LadpClient;
use App\Src\web\model\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class IndexController extends Controller
{
    public function index()
    {
//        $seconds = 5;
//        $job = (new sms('1711111'))->delay(Carbon::now()->addSeconds($seconds));
//        dispatch($job);
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
                dump($bool);

            }
            dump($file);
        }
        return view('weapp.index.upload');
    }
}