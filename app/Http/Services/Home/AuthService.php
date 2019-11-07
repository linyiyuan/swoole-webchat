<?php
namespace App\Http\Services\Home;

use App\Http\Services\BaseService;
use App\Models\Home\ChatUser;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;

/**
 * Class AnnounceService
 * @package App\Http\Services
 * @Author YiYuan-LIn
 * @Date: 2019/4/26
 * Auth服务类
 */
class AuthService extends BaseService
{

    /**
     * 用户登录逻辑实现
     *
     * @param $postData
     * @return bool
     * @throws \Exception
     */
    public function doLogin($postData)
    {
        $userInfo = ChatUser::getInfoByEmail($postData['email']);

        if (empty($userInfo)) $this->throwExp(400, '用户不存在，登录失败');
        if (!Hash::check($postData['password'], $userInfo['password'])) $this->throwExp(400, '密码错误，请重新输入密码');

        //存储到COOKie当中
        Cookie::queue(config('services.cookie.COOKIE_KYE:USER_INFO'), json_encode($userInfo), $minutes = 120, $path = null, $domain = null, $secure = false, $httpOnly = false);

        return true;
    }

    /**
     * 注册用户逻辑实现
     *
     * @param $postData
     * @return bool
     * @throws \Exception
     */
    public function  doRegister($postData)
    {
        unset($postData['captcha']);
        $postData['password'] = Hash::make($postData['password']);

        $postData['last_login_ip'] = getClientIp();
        $postData['last_login_time'] = time();
        $postData['avatar'] = env('APP_URL') . '/images/face/face' . mt_rand(1, 10) . '.png';

        //写入用户表中
        if (empty(ChatUser::setChatUser($postData))) $this->throwExp(400, '添加用户数据失败');

        return true;
    }
}