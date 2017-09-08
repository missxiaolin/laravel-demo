<?php

namespace App\Jobs\SMS;

use App\Src\web\model\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class sms implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $mobile;

    /**
     * Create a new job instance.
     * @param $mobile
     */
    public function __construct($mobile)
    {
        $this->mobile = $mobile;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $user_model = new User();
        $user_model->name='1';
        $user_model->email = $this->mobile;
        $user_model->password = 1;
        $user_model->save();
    }
}