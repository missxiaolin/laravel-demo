<?php
namespace Huifang\Src\user\response;



use Carbon\Carbon;
use Huifang\Src\user\model\UserModel;

class UserResponse
{
    /**
     * 生成访问口令
     *
     * @return string
     */
    public function generateAccessToken()
    {
        return md5(uniqid("xl_account", true));
    }

    /**
     * @param $user_name
     * @return \Illuminate\Database\Eloquent\Model|null|static
     */
    public function setToken($user_name)
    {
        $user_model = UserModel::where(['username'=>$user_name])->first();
        $user_model->token = $this->generateAccessToken();
        $user_model->expires_at = Carbon::now()->addMinute(3600);
        $user_model->save();
        return $user_model;
    }
}