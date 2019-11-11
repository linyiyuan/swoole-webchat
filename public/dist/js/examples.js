$(function () {
    buildWebSocket();
    /**
     * Some examples of how to use features.
     *
     **/

    let SohoExamle = {
        Message: {
            add: function (userInfo, message, time) {
                var chat_body = $('.layout .content .chat .chat-body');
                if (chat_body.length > 0) {

                    $('.layout .content .chat .chat-body .messages').append(`<div class="message-item outgoing-message">
                        <div class="message-avatar">
                            <figure class="avatar">
                                <img src="` + userInfo.avatar + `" class="rounded-circle">
                            </figure>
                            <div>
                                <h5>` + userInfo.nickname + `</h5>
                                <div class="time">` + time + ` <i class="ti-check"></i></div>
                            </div>
                        </div>
                        <div class="message-content">
                            ` + message + `
                        </div>
                    </div>`);

                    setTimeout(function () {
                        chat_body.scrollTop(chat_body.get(0).scrollHeight, -1).niceScroll({
                            cursorcolor: 'rgba(66, 66, 66, 0.20)',
                            cursorwidth: "4px",
                            cursorborder: '0px'
                        }).resize();
                    }, 200);
                    $('#last_message').html(message)
                    $('#last_message_time').html(time)
                }
            }
        }
    };

    //定时器，打开页面后定时弹出窗口
    setTimeout(function () {
        //断开连接模态框
        // $('#disconnected').modal('show');
        //语音聊天模态框
        // $('#call').modal('show');
        //视频聊天模态框
        // $('#videoCall').modal('show');
        //提示前往github模态框
        // $('#pageTour').modal('show');
    }, 1000);


    $(document).on('submit', '.layout .content .chat .chat-footer form', function (e) {
        e.preventDefault();

        let input = $(this).find('input[type=text]');
        let message = input.val();
        let userInfo = JSON.parse($.cookie('COOKIE:USER_INFO'));
        let time = getFormatDate();

        message = $.trim(message);
        SohoExamle.Message.add(userInfo, message, time);
        input.val('');

        if (message) {
            let messageData = {
                'type': 2,
                'to' : null,
                'from_uid' : $('#user_id').val(),
                'message': message
            }
            sendMsg(messageData);
        } else {
            input.focus();
        }
    });

    $(document).on('click', '.layout .content .sidebar-group .sidebar .list-group-item', function () {
        if (jQuery.browser.mobile) {
            $(this).closest('.sidebar-group').removeClass('mobile-open');
        }
    });

    $('.go-github').on('click', function(){
        location.href="https://github.com/linyiyuan/swoole-webchat"
    })

    function buildWebSocket() {
        ws = new WebSocket("ws://192.168.2.36:9501");//连接服务器
        ws.onopen = function(event){

        };
        ws.onmessage = function (event) {
            let data = JSON.parse(event.data);
            switch (data.type) {
                case 1:
                    onLineBroadcast(data.message);
                    break;
                case 2:
                    groupChat(data);
                    break;
            }

        }
        ws.onclose = function(event){alert("已经与服务器断开连接\r\n当前连接状态："+this.readyState);};

        ws.onerror = function(event) {

        }
    }

    var ws;

    //发送方法
    function sendMsg(msg){
        msg = JSON.stringify(msg)
        console.log(msg);
        ws.send(msg);
    }
    //提示加入信息
    function onLineBroadcast(data) {
        $('.layout .content .chat .chat-body .messages').append(`<div class="newly-people">
                <div class="message-avatar">

                </div>
                <h7>` + data.message + `</h7>
            </div>`);
        $('#onlineCount').text(data.onlineCount)
    }

    //群聊发送消息
    function groupChat(data) {
        let userInfo =  JSON.parse(data.from_user_info);
        let message = data.message;
        let time = data.time;


        let chat_body = $('.layout .content .chat .chat-body');
        if (chat_body.length > 0) {
            $('.layout .content .chat .chat-body .messages').append(`<div class="message-item">
                        <div class="message-avatar">
                            <figure class="avatar">
                                <img src="` + userInfo.avatar + `" class="rounded-circle">
                            </figure>
                            <div>
                                <h5>` + userInfo.nickname  + `</h5>
                                <div class="time"> ` + time + `</div>
                            </div>
                        </div>
                        <div class="message-content">
                            ` + message + `
                        </div>
                    </div>`);

            setTimeout(function () {
                chat_body.scrollTop(chat_body.get(0).scrollHeight, -1).niceScroll({
                    cursorcolor: 'rgba(66, 66, 66, 0.20)',
                    cursorwidth: "4px",
                    cursorborder: '0px'
                }).resize();
            }, 200);
            $('#last_message').html(message)
            $('#last_message_time').html(time)
        }
    }

    //获取当前时间
    function getFormatDate(){
        var nowDate = new Date();
        var year = nowDate.getFullYear();
        var month = nowDate.getMonth() + 1 < 10 ? "0" + (nowDate.getMonth() + 1) : nowDate.getMonth() + 1;
        var date = nowDate.getDate() < 10 ? "0" + nowDate.getDate() : nowDate.getDate();
        var hour = nowDate.getHours()< 10 ? "0" + nowDate.getHours() : nowDate.getHours();
        var minute = nowDate.getMinutes()< 10 ? "0" + nowDate.getMinutes() : nowDate.getMinutes();
        var second = nowDate.getSeconds()< 10 ? "0" + nowDate.getSeconds() : nowDate.getSeconds();
        return year + "-" + month + "-" + date+" "+hour+":"+minute+":"+second;
    }

});

