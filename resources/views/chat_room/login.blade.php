@include('chat_room.message')
@extends('chat_room.common')

<div class="form-wrapper">
    <!-- logo -->
    <div class="logo">
        <svg version="1.1" xmlns="http://www.w3.org/2000/svg"
             xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
             width="612px" height="100px" viewBox="0 0 612 612"
             style="enable-background:new 0 0 612 612;" xml:space="preserve">
            <g>
                <g id="_x32__26_">
                    <g>
                        <path d="M401.625,325.125h-191.25c-10.557,0-19.125,8.568-19.125,19.125s8.568,19.125,19.125,19.125h191.25
                    c10.557,0,19.125-8.568,19.125-19.125S412.182,325.125,401.625,325.125z M439.875,210.375h-267.75
                    c-10.557,0-19.125,8.568-19.125,19.125s8.568,19.125,19.125,19.125h267.75c10.557,0,19.125-8.568,19.125-19.125
                    S450.432,210.375,439.875,210.375z M306,0C137.012,0,0,119.875,0,267.75c0,84.514,44.848,159.751,114.75,208.826V612
                    l134.047-81.339c18.552,3.061,37.638,4.839,57.203,4.839c169.008,0,306-119.875,306-267.75C612,119.875,475.008,0,306,0z
                    M306,497.25c-22.338,0-43.911-2.601-64.643-7.019l-90.041,54.123l1.205-88.701C83.5,414.133,38.25,345.513,38.25,267.75
                    c0-126.741,119.875-229.5,267.75-229.5c147.875,0,267.75,102.759,267.75,229.5S453.875,497.25,306,497.25z"/>
                    </g>
                </g>
            </g>
            <g></g>
            <g></g>
            <g></g>
            <g></g>
            <g></g>
            <g></g>
            <g></g>
            <g></g>
            <g></g>
            <g></g>
            <g></g>
            <g></g>
            <g></g>
            <g></g>
            <g></g>
        </svg>
    </div>
    <!-- ./ logo -->

    <h5>Swoole-WebChat</h5>

    <!-- form -->
    <form action="{{ url('/auth/doLogin') }}" method= "post" >
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group">
            <input type="text" name="email" class="form-control" placeholder="请输入邮箱进行登录" required autofocus>
        </div>
        <div class="form-group">
            <input type="password" name="password" class="form-control" placeholder="请输入登录密码" required>
        </div>
        <div class="form-group d-flex justify-content-between">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" checked="" id="customCheck1">
                <label class="custom-control-label" for="customCheck1">Remember me</label>
            </div>
            <a href="{{ url('/reset_password') }}">重置密码</a>
        </div>
        <button class="btn btn-primary btn-block">登录</button>
        <hr>
        <p class="text-muted">第三方登录平台</p>
        <ul class="list-inline">
            <li class="list-inline-item">
                <a href="{{ url('/OAuth/github') }}" class="btn btn-floating btn-instagram">
                    <i class="fa fa-github"></i>
                </a>
            </li>
            <li class="list-inline-item">
                <a href="{{ url('/OAuth/qq') }}" class="btn btn-floating btn-twitter">
                    <i class="fa fa-qq"></i>
                </a>
            </li>
            <li class="list-inline-item">
                <a href="{{ url('/OAuth/weibo') }}" class="btn btn-floating btn-dribbble">
                    <i class="fa fa-weibo"></i>
                </a>
            </li>
            <li class="list-inline-item">
                <a href="{{ url('/OAuth/google') }}" class="btn btn-floating btn-google">
                    <i class="fa fa-google"></i>
                </a>
            </li>
            <li class="list-inline-item">
                <a href="#" class="btn btn-floating btn-linkedin">
                    <i class="fa fa-linkedin"></i>
                </a>
            </li>
            <li class="list-inline-item">
                <a href="#" class="btn btn-floating btn-behance">
                    <i class="fa fa-behance"></i>
                </a>
            </li>
        </ul>
        <hr>
        <p class="text-muted">Don't have an account?</p>
        <a href="{{ url('/auth/register') }}" class="btn btn-outline-light btn-sm">Register now!</a>
    </form>
    <!-- ./ form -->

</div>