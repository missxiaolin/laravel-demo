<?php

namespace App\Http\Controllers\Weapp;

use App\Jobs\SendEmail;
use App\Jobs\SMS\sms;
use App\Libs\LadpClient;
use App\Src\web\model\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Storage;

class IndexController extends Controller
{
    public function index()
    {
//        $seconds = 5;
//        $job = (new sms('1711111'))->delay(Carbon::now()->addSeconds($seconds));
//        dispatch($job);
        dispatch(new SendEmail('944050840@qq.com'));
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

    /**
     * 邮件发送
     */
    public function mail()
    {
        // 方法1
//        Mail::raw('邮件内容',function ($message){
//            $message->from('17135501105@163.com','小林');
//            $message->subject('邮件主题测试');
//            $message->to('462441355@qq.com');
//        });

        // 方法2
        Mail::send('weapp.email.mail', ['name' => 'sean'], function ($message) {
            $message->to('462441355@qq.com');
        });
    }

    /**
     * 缓存的使用
     */
    public function useCache()
    {
        for ($i = 0;$i < 150; $i++){
            dispatch(new SendEmail('944050840@qq.com'));
        }
//        Redis::sadd('key1', 'val1');
//        dump(Redis::smembers('key1'));
//        Redis::set('a',1);
//        dump(Redis::get('a'));
//        Cache::put('key1', 'val1', 10);
//        $key1 = Cache::get('key1');
//        dump($key1);
    }
}