<div class="sidebar-group">
    <!-- 导航列表 -->
    <div id="chats" class="sidebar active">
        <header>
            <span>最近聊天</span>
            <ul class="list-inline">
                <li class="list-inline-item" data-toggle="tooltip" title="添加组/群">
                    <a class="btn btn-outline-light" href="#" data-toggle="modal" data-target="#newGroup">
                        <i data-feather="users"></i>
                    </a>
                </li>
                <li class="list-inline-item">
                    <a class="btn btn-outline-light" data-toggle="tooltip" title="添加新的聊天" href="#"
                       data-navigation-target="friends">
                        <i data-feather="plus-circle"></i>
                    </a>
                </li>
                <li class="list-inline-item d-xl-none d-inline">
                    <a href="#" class="btn btn-outline-light text-danger sidebar-close">
                        <i data-feather="x"></i>
                    </a>
                </li>
            </ul>
        </header>
        <form>
            <input type="text" class="form-control" placeholder="搜索聊天">
        </form>
        <div class="sidebar-body">
            <ul class="list-group list-group-flush">
                {{--<li class="list-group-item">--}}
                {{--<figure class="avatar avatar-state-success">--}}
                {{--<img src="./dist/media/img/man_avatar1.jpg" class="rounded-circle" alt="image">--}}
                {{--</figure>--}}
                {{--<div class="users-list-body">--}}
                {{--<div>--}}
                {{--<h5 class="text-primary">Townsend Seary</h5>--}}
                {{--<p>What's up, how are you?</p>--}}
                {{--</div>--}}
                {{--<div class="users-list-action">--}}
                {{--<div class="new-message-count">3</div>--}}
                {{--<small class="text-primary">03:41 PM</small>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--</li>--}}

                <li class="list-group-item open-chat">
                    <div>
                        <figure class="avatar avatar-state-success">
                            <img src="{{ asset('/dist/media/img/peoples.jpg') }}" class="rounded-circle" alt="image">
                        </figure>
                    </div>
                    <div class="users-list-body">
                        <div>
                            <h5>公共群聊</h5>
                            <p id="last_message"></p>
                        </div>
                        <div class="users-list-action">
                            <small class="text-muted" id="last_message_time"></small>
                            <div class="action-toggle">
                                <div class="dropdown">
                                    <a data-toggle="dropdown" href="#">
                                        <i data-feather="more-horizontal"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a href="#" data-navigation-target="contact-information"
                                           class="dropdown-item">查看信息</a>
                                        <div class="dropdown-divider"></div>
                                        <a href="#" class="dropdown-item text-danger">移除该回话</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <!-- ./ 导航列表 -->

    <!-- 好友列表 sidebar -->
    <div id="friends" class="sidebar">
        <header>
            <span>好友列表</span>
            <ul class="list-inline">
                <li class="list-inline-item" data-toggle="tooltip" title="添加朋友">
                    <a class="btn btn-outline-light" href="#" data-toggle="modal" data-target="#addFriends">
                        <i data-feather="user-plus"></i>
                    </a>
                </li>
                <li class="list-inline-item d-xl-none d-inline">
                    <a href="#" class="btn btn-outline-light text-danger sidebar-close">
                        <i data-feather="x"></i>
                    </a>
                </li>
            </ul>
        </header>
        <form>
            <input type="text" class="form-control" placeholder="搜索好友">
        </form>
        <div class="sidebar-body">
            <ul class="list-group list-group-flush">
                <li class="list-group-item" data-navigation-target="chats">
                    <div>
                        <figure class="avatar">
                            <img src="./dist/media/img/women_avatar5.jpg" class="rounded-circle" alt="image">
                        </figure>
                    </div>
                    <div class="users-list-body">
                        <div>
                            <h5>Harrietta Souten</h5>
                            <p>Dental Hygienist</p>
                        </div>
                        <div class="users-list-action">
                            <div class="action-toggle">
                                <div class="dropdown">
                                    <a data-toggle="dropdown" href="#">
                                        <i data-feather="more-horizontal"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a href="#" class="dropdown-item">开始聊天</a>
                                        <a href="#" data-navigation-target="contact-information"
                                           class="dropdown-item">查看信息</a>
                                        <div class="dropdown-divider"></div>
                                        <a href="#" class="dropdown-item text-danger">删除该好友</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <!-- ./ 好友列表 sidebar -->

    <!-- 星标好友 sidebar -->
    <div id="favorites" class="sidebar">
        <header>
            <span>星标好友</span>
            <ul class="list-inline">
                <li class="list-inline-item d-xl-none d-inline">
                    <a href="#" class="btn btn-outline-light text-danger sidebar-close">
                        <i data-feather="x"></i>
                    </a>
                </li>
            </ul>
        </header>
        <form>
            <input type="text" class="form-control" placeholder="搜索好友">
        </form>
        <div class="sidebar-body">
            <ul class="list-group list-group-flush users-list">
                <li class="list-group-item">
                    <div class="users-list-body">
                        <div>
                            <h5>Jennica Kindred</h5>
                            <p>I know how important this file is to you. You can trust me ;)</p>
                        </div>
                        <div class="users-list-action">
                            <div class="action-toggle">
                                <div class="dropdown">
                                    <a data-toggle="dropdown" href="#">
                                        <i data-feather="more-horizontal"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a href="#" class="dropdown-item">Open</a>
                                        <a href="#" class="dropdown-item">Remove favorites</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <!-- ./ Stars sidebar -->

    <!-- 活跃好友 sidebar -->
    <div id="archived" class="sidebar">
        <header>
            <span>Archived</span>
            <ul class="list-inline">
                <li class="list-inline-item d-xl-none d-inline">
                    <a href="#" class="btn btn-outline-light text-danger sidebar-close">
                        <i data-feather="x"></i>
                    </a>
                </li>
            </ul>
        </header>
        <form>
            <input type="text" class="form-control" placeholder="Search archived">
        </form>
        <div class="sidebar-body">
            <ul class="list-group list-group-flush users-list">
                <li class="list-group-item">
                    <figure class="avatar">
                        <span class="avatar-title bg-danger rounded-circle">M</span>
                    </figure>
                    <div class="users-list-body">
                        <div>
                            <h5>Mercedes Pllu</h5>
                            <p>I know how important this file is to you. You can trust me ;)</p>
                        </div>
                        <div class="users-list-action">
                            <div class="action-toggle">
                                <div class="dropdown">
                                    <a data-toggle="dropdown" href="#">
                                        <i data-feather="more-horizontal"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a href="#" class="dropdown-item">Open</a>
                                        <a href="#" class="dropdown-item">Restore</a>
                                        <div class="dropdown-divider"></div>
                                        <a href="#" class="dropdown-item text-danger">Delete</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="list-group-item">
                    <figure class="avatar">
                        <span class="avatar-title bg-secondary rounded-circle">R</span>
                    </figure>
                    <div class="users-list-body">
                        <div>
                            <h5>Rochelle Golley</h5>
                            <p>Lorem ipsum dolor sitsdc sdcsdc sdcsdcs</p>
                        </div>
                        <div class="users-list-action">
                            <div class="action-toggle">
                                <div class="dropdown">
                                    <a data-toggle="dropdown" href="#">
                                        <i data-feather="more-horizontal"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a href="#" class="dropdown-item">Open</a>
                                        <a href="#" class="dropdown-item">Restore</a>
                                        <div class="dropdown-divider"></div>
                                        <a href="#" class="dropdown-item text-danger">Delete</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <!-- ./ 活跃好友 sidebar -->

</div>