@include('chat_room.message')
<Html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Swoole-WebChat 聊天室</title>

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('/dist/media/img/favicon.png') }}" type="image/png">
    <!-- Bundle Styles -->
    <link rel="stylesheet" href="{{ asset('/vendor/bundle.css') }}">
    <link rel="stylesheet" href="{{ asset('/vendor/enjoyhint/enjoyhint.css') }}">
    <!-- App styles -->
    <link rel="stylesheet" href="{{ asset('dist/css/app.min.css') }}">
</head>
<body>
<input type="hidden" id="user_id" value=" {{ $userInfo->id }}" >
<!-- page loading -->
<div class="page-loading"></div>
<!-- ./ page loading -->

<!-- 页面弹出框，提示前往github -->
<div class="modal fade" id="pageTour" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-zoom" role="document">
        <div class="modal-content">
            <div class="modal-body text-center pt-5">
                <div class="row">
                    <div class="col-md-6 offset-3">
                        <figure>
                            <img src="dist/media/svg/undraw_product_tour_foyt.svg" class="img-fluid" alt="image">
                        </figure>
                        <p class="lead mt-5">如何你对这个作品感兴趣的话 请给项目一个star吧</p>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-center">
                {{--start-tour 这个样式加上去会增加步骤提示--}}
                <button type="button" class="btn btn-primary  go-github">前往Github</button>
                <button type="button" class="btn btn-link" data-dismiss="modal" aria-label="Close">关闭</button>
            </div>
        </div>
    </div>
</div>
<!-- ./ 页面弹出框，提示前往github -->

<!-- 断开连接模态框 -->
<div class="modal fade" id="disconnected" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-zoom" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row mb-5">
                    <div class="col-md-6 offset-3">
                        <img src="./dist/media/svg/undraw_warning_cyit.svg" class="img-fluid" alt="image">
                    </div>
                </div>
                <p class="lead text-center">Application disconnected</p>
            </div>
            <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-success btn-lg">Reconnect</button>
                <a href="login.html" class="btn btn-link">Logout</a>
            </div>
        </div>
    </div>
</div>
<!-- ./ 断开连接模态框 -->

<!-- 语音聊天模态框 -->
<div class="modal call fade" id="call" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-zoom" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="call">
                    <div>
                        <figure class="mb-4 avatar avatar-xl">
                            <img src="./dist/media/img/women_avatar1.jpg" class="rounded-circle" alt="image">
                        </figure>
                        <h4>Brietta Blogg <span class="text-success">calling...</span></h4>
                        <div class="action-button">
                            <button type="button" class="btn btn-danger btn-floating btn-lg" data-dismiss="modal">
                                <i data-feather="x"></i>
                            </button>
                            <button type="button" class="btn btn-success btn-pulse btn-floating btn-lg">
                                <i data-feather="phone"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ./ 语音聊天模态框 -->

<!-- 添加朋友模态框 -->
<div class="modal fade" id="addFriends" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-zoom" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i data-feather="user-plus" class="mr-2"></i> Add Friends
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="ti-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="alert alert-info">Send invitations to friends.</div>
                <form>
                    <div class="form-group">
                        <label for="emails" class="col-form-label">Email addresses</label>
                        <input type="text" class="form-control" id="emails">
                    </div>
                    <div class="form-group">
                        <label for="message" class="col-form-label">Invitation message</label>
                        <textarea class="form-control" id="message"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </div>
</div>
<!-- ./ 添加朋友模态框 -->

<!-- 添加群组模态框 -->
<div class="modal fade" id="newGroup" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-zoom" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i data-feather="users" class="mr-2"></i> New Group
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="ti-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="group_name" class="col-form-label">Group name</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="group_name">
                            <div class="input-group-append">
                                <button class="btn btn-light" data-toggle="tooltip" title="Emoji" type="button">
                                    <i data-feather="smile"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <p class="mb-2">The group members</p>
                    <div class="form-group">
                        <div class="avatar-group">
                            <figure class="avatar" data-toggle="tooltip" title="Tobit Spraging">
                                <span class="avatar-title bg-success rounded-circle">T</span>
                            </figure>
                            <figure class="avatar" data-toggle="tooltip" title="Cloe Jeayes">
                                <img src="./dist/media/img/women_avatar4.jpg" class="rounded-circle" alt="image">
                            </figure>
                            <figure class="avatar" data-toggle="tooltip" title="Marlee Perazzo">
                                <span class="avatar-title bg-warning rounded-circle">M</span>
                            </figure>
                            <figure class="avatar" data-toggle="tooltip" title="Stafford Pioch">
                                <img src="./dist/media/img/man_avatar1.jpg" class="rounded-circle" alt="image">
                            </figure>
                            <figure class="avatar" data-toggle="tooltip" title="Bethena Langsdon">
                                <span class="avatar-title bg-info rounded-circle">B</span>
                            </figure>
                            <a href="#" title="Add friends">
                                <figure class="avatar">
                                    <span class="avatar-title bg-primary rounded-circle">
                                        <i data-feather="plus"></i>
                                    </span>
                                </figure>
                            </a>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="description" class="col-form-label">Description</label>
                        <textarea class="form-control" id="description"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary">Create Group</button>
            </div>
        </div>
    </div>
</div>
<!-- ./ 添加群组模态框 -->

<!-- 设置 模态框 -->
@include('chat_room.index_module.setting')
<!-- ./ 设置 模态框 -->

<!-- 修改个人信息模态框 -->
@include('chat_room.index_module.edit_profile')
<!-- ./ 修改个人信息模态框 -->

<!-- 页面主体部分 -->
<div class="layout">
    <!-- 最左选项栏  -->
    @include('chat_room.index_module.left_navigation')
    <!-- ./ 最左选项栏 -->

    <!-- 内容部分 -->
    <div class="content">
        <!-- sidebar group -->
        @include('chat_room.index_module.sidebar_group')
        <!-- ./ sidebar group -->

        <!-- chat -->
        @include('chat_room.index_module.chat')
        <!-- ./ chat -->

        <!-- chat -->
        @include('chat_room.index_module.user_info')
        <!-- ./ chat -->
    </div>
    <!-- ./ content -->

</div>
<!-- ./ layout -->
<!-- Bundle -->
<script src="{{ asset('/vendor/bundle.js') }}"></script>
<script src="{{ asset('/vendor/enjoyhint/enjoyhint.min.js') }}"></script>
<!-- App scripts -->
<script src=" {{ asset('/dist/js/app.min.js') }}"></script>
<!-- Examples -->
<script src=" {{ asset('/dist/js/examples.js') }}"></script>
<script src="//cdn.bootcss.com/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>

</body>
</Html>