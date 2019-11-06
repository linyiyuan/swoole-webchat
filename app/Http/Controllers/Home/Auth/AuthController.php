<?php

namespace App\Http\Controllers\Home\Auth;

use App\Http\Controllers\Home\CommonController;
use App\Http\Services\Home\AuthService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Validator;

class AuthController extends CommonController
{
    public function login()
    {
        return view('chat_room.login');
    }

    public function register()
    {
        return view('chat_room.register');
    }

    /**
     * 退出登录操作
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout()
    {
        Cookie::forget('key');

        return $this->webSuccessResponse('退出登录成功', '/auth/login');

    }

    /**
     * 用户登录操作
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function doLogin(Request $request)
    {
        try {
            $data = [
                'email' => $request->post('email'),
                'password' => $request->post('password'),
            ];

            $rules = [
                'email' => 'required|email',
                'password' => 'required',
            ];

            $message = [
                'email.required' => '邮箱不允许为空',
                'email.email' => '邮箱格式不正确',
                'password.required' => '密码不允许为空',
            ];

            $validator = Validator::make($data, $rules, $message);

            //验证表单
            if ($validator->fails()) return redirect('/auth/login')->withErrors($validator);

            if (AuthService::getInstance()->doLogin($data)) return $this->webSuccessResponse('登录成功', '/');

            return $this->webErrorResponse(400, '登录失败');
        }catch (\Exception $e) {
            return $this->webErrorExp($e);
        }
    }

    /**
     * 注册用户操作
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function doRegister(Request $request)
    {
        try {
            $data = [
                'nickname' => $request->post('nickname'),
                'mobile_num' => $request->post('mobile_num'),
                'email' => $request->post('email'),
                'password' => $request->post('password'),
                'captcha' => $request->post('captcha')
            ];

            $rules = [
                'nickname' => 'required',
                'mobile_num' => 'required|integer',
                'email' => 'required|email|unique:chat_user',
                'password' => 'required|min:6|max:18',
                'captcha' => 'required|captcha',
            ];

            $message = [
                'nickname.required' => '昵称不允许为空',
                'mobile_num.required' => '手机号不能为空',
                'mobile_num.integer' => '手机号格式错误',
                'email.required' => '邮箱不允许为空',
                'email.email' => '邮箱格式不正确',
                'email.unique' => '该邮箱已经被注册',
                'password.required' => '密码不允许为空',
                'captcha.required' => '验证码不允许为空',
                'captcha.captcha' => '验证码错误',
                'password.min' => '密码不允许少于6位',
                'password.max' => '密码不允许超过18位',
            ];

            $validator = Validator::make($data, $rules, $message);

            //验证表单
            if ($validator->fails()) return redirect('/auth/register')->withErrors($validator);

            if (AuthService::getInstance()->doRegister($data)) return $this->webSuccessResponse('注册用户成功 请登录', '/auth/login');

            return $this->webErrorResponse(400, '注册失败');
        }catch (\Exception $e) {
            return $this->webErrorExp($e);
        }

    }
}
