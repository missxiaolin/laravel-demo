<?php
namespace Huifang\Src\user\service;



use Huifang\Src\user\response\UserResponse;

class UserService
{
    /**
     * @param $user_name
     * @return \Illuminate\Database\Eloquent\Model|null|static
     */
    public static function setToken($user_name)
    {
        $user_response = new UserResponse();
        return $user_response->setToken($user_name);
    }
}