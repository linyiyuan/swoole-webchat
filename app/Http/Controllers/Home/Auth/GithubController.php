<?php

namespace App\Http\Controllers\Home\Auth;

use App\Http\Controllers\BaseController;
use App\Models\Home\ChatUser;
use Illuminate\Support\Facades\Cookie;
use Laravel\Socialite\Facades\Socialite;

/**
 * Github第三方登录
 *
 * Class GithubController
 * @package App\Http\Controllers\Home\Auth
 * @Author YiYuan-LIn
 * @Date: 2019/11/6
 */
class GithubController extends BaseController
{
    /**
     * GitHub登录初始化
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function init()
    {
        return Socialite::driver('github')->redirect();
    }

    /**
     * Github第三方登录回调地址
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function callback()
    {
        //获取用户信息
        $oauthUser = Socialite::driver('github')->user();

        $userInfo['nickname'] = $oauthUser->nickname;
        $userInfo['access_token'] = $oauthUser->token;
        $userInfo['open_id'] = $oauthUser->id;
        $userInfo['avatar'] = $oauthUser->avatar;
        $userInfo['email'] = $oauthUser->email ?? '';

        //注册用户
        if(!$userId = ChatUser::setChatUser($userInfo)) return redirect('/auth/login?error=注册用户失败');
        $userInfo['id'] = $userId;

        $userInfo = json_encode($userInfo);

        //存储到COOKie当中
        Cookie::queue('userInfo', $userInfo, $minutes = 120, $path = null, $domain = null, $secure = false, $httpOnly = false);

        return redirect('/');
    }

}
