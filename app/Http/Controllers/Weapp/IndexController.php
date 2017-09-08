<?php

namespace App\Http\Controllers\Weapp;

use App\Jobs\SMS\sms;
use Carbon\Carbon;

class IndexController extends Controller
{
    public function index()
    {
        $seconds = 5;
        $job = (new sms('1711111'))->delay(Carbon::now()->addSeconds($seconds));
        dispatch($job);


    }
}