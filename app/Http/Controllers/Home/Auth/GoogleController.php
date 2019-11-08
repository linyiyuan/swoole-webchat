<?php

namespace App\Http\Controllers\Home\Auth;

use App\Models\Home\ChatUser;
use http\Cookie;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    /**
     * QQ登录初始化
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function init()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * QQ第三方登录回调地址
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function callback()
    {
        //获取用户信息
        $oauthUser = Socialite::driver('google')->user();

        $userInfo['nickname'] = $oauthUser->nickname;
        $userInfo['access_token'] = $oauthUser->token;
        $userInfo['open_id'] = $oauthUser->id;
        $userInfo['avatar'] = $oauthUser->avatar;
        $userInfo['mobile_num'] = $oauthUser->phone ?? '';
        $userInfo['email'] = $oauthUser->email ?? '';

        //注册用户
        if(!$userId = ChatUser::setChatUser($userInfo)) return redirect('/auth/login?error=注册用户失败');
        $userInfo['id'] = $userId;

        //存储到COOKie当中
        Cookie::queue(config('services.cookie.COOKIE_KYE:USER_INFO'), json_encode($userInfo), $minutes = 120, $path = null, $domain = null, $secure = false, $httpOnly = false);
        return redirect('/');
    }
}
