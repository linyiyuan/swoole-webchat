<?php

namespace App\Http\Controllers\Home;

use App\Models\Home\ChatUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cookie;

class IndexController extends Controller
{
    /**
     * 聊天室主页面
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        //先从Cookie中获取用户的信息然后再查询数据库获取最新用户数据
        $userId = json_decode(Cookie::get(config('services.cookie.COOKIE_KYE:USER_INFO')), true)['id'];
        $userInfo = ChatUser::getInfoById($userId);


        return view('chat_room.index', compact('userInfo'));
    }
}
