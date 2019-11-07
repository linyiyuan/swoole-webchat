<style>
    .newly-people{
        width: 100%;
        text-align: center;
        font-size: 10px;
        color: #0a80ff!important;
    }

</style>

<div class="chat">
    <div class="chat-header">
        <div class="chat-header-user">
            <figure class="avatar">
                <img src="./dist/media/img/man_avatar3.jpg" class="rounded-circle" alt="image">
            </figure>
            <div>
                <h5>Byrom Guittet</h5>
                <small class="text-success">
                    <i>writing...</i>
                </small>
            </div>
        </div>
        <div class="chat-header-action">
            <ul class="list-inline">
                <li class="list-inline-item d-xl-none d-inline">
                    <a href="#" class="btn btn-outline-light mobile-navigation-button">
                        <i data-feather="menu"></i>
                    </a>
                </li>
                <li class="list-inline-item">
                    <a href="#" class="btn btn-outline-light" data-toggle="dropdown">
                        <i data-feather="more-horizontal"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="#" data-navigation-target="contact-information"
                           class="dropdown-item">查看信息</a>
                        <a href="#" class="dropdown-item">移除该会话</a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item text-danger">删除该好友</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    {{--聊天主题--}}
    <div class="chat-body">
        <div class="messages">
            <div class="message-item outgoing-message">
                <div class="message-avatar">
                    <figure class="avatar">
                        <img src="./dist/media/img/women_avatar5.jpg" class="rounded-circle" alt="image">
                    </figure>
                    <div>
                        <h5>Mirabelle Tow</h5>
                        <div class="time">01:20 PM <i class="ti-double-check text-info"></i></div>
                    </div>
                </div>
                <div class="message-content">
                    Hello how are you?
                </div>
            </div>
            <div class="message-item">
                <div class="message-avatar">
                    <figure class="avatar">
                        <img src="./dist/media/img/man_avatar3.jpg" class="rounded-circle" alt="image">
                    </figure>
                    <div>
                        <h5>Byrom Guittet</h5>
                        <div class="time">01:35 PM</div>
                    </div>
                </div>
                <div class="message-content">
                    I'm fine, how are you 😃
                </div>
            </div>
            <div class="message-item">
                <div class="message-avatar">
                    <figure class="avatar">
                        <img src="./dist/media/img/man_avatar3.jpg" class="rounded-circle" alt="image">
                    </figure>
                    <div>
                        <h5>Byrom Guittet</h5>
                        <div class="time">10:43 AM</div>
                    </div>
                </div>
                <figure>
                    <img src="dist/media/img/image1.jpg" class="w-25 img-fluid rounded" alt="image">
                </figure>
            </div>

        </div>
    </div>
    <div class="chat-footer">
        <form>
            <div>
                <button class="btn btn-light mr-3" data-toggle="tooltip" title="Emoji" type="button">
                    <i data-feather="smile"></i>
                </button>
            </div>
            <input type="text" class="form-control" placeholder="Write a message.">
            <div class="form-buttons">
                <button class="btn btn-light" data-toggle="tooltip" title="Add files" type="button">
                    <i data-feather="paperclip"></i>
                </button>
                <button class="btn btn-light d-sm-none d-block" data-toggle="tooltip"
                        title="Send a voice record" type="button">
                    <i data-feather="mic"></i>
                </button>
                <button class="btn btn-primary" type="submit">
                    <i data-feather="send"></i>
                </button>
            </div>
        </form>
    </div>
</div>
