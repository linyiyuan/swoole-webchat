<!--the css for jquery.mCustomScrollbar-->
<link rel="stylesheet" href="{{ asset('/dist/emoji/lib/css/jquery.mCustomScrollbar.min.css') }}"/>
<!--the css for this plugin-->
<link rel="stylesheet" href="{{ asset('/dist/emoji/src/css/jquery.emoji.css') }}"/>
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
                <img src="{{ asset('/dist/media/img/peoples.jpg') }}" class="rounded-circle" alt="image">
            </figure>
            <div>
                <h5>公共群聊</h5>
                <small class="text-success">
                    <i>在线人数：<span id="onlineCount"></span></i>
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
        </div>
    </div>
    <div class="chat-footer">
        <form>
            <div>
                <button id="emoji" class="btn btn-light mr-3" data-toggle="tooltip" title="Emoji" type="button" >
                    <i data-feather="smile"></i>
                </button>
            </div>
            <input type="text" id="content" contenteditable="true" class="form-control" placeholder="Write a message." >
            {{--<div id="content" ></div>--}}
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

<!--(Optional) the js for jquery.mCustomScrollbar's addon-->
<script src="{{ asset('/dist/emoji/lib/script/jquery.mousewheel-3.0.6.min.js') }}"></script>
<!--the js for jquery.mCustomScrollbar-->
<script src="{{ asset('/dist/emoji/lib/script/jquery.mCustomScrollbar.min.js') }}"></script>
<!--the js for this plugin-->
<script src="{{ asset('/dist/emoji/src/js/jquery.emoji.js') }}"></script>

<script>
    // $("#content").emoji({
    //     showTab: true,
    //     animation: 'fade',
    //     icons: [{
    //         name: "贴吧表情",
    //         path: "/dist/emoji/src/img/tieba/",
    //         maxNum: 50,
    //         file: ".jpg",
    //         placeholder: ":{alias}:",
    //         alias: {
    //             1: "hehe",
    //             2: "haha",
    //             3: "tushe",
    //             4: "a",
    //             5: "ku",
    //             6: "lu",
    //             7: "kaixin",
    //             8: "han",
    //             9: "lei",
    //             10: "heixian",
    //             11: "bishi",
    //             12: "bugaoxing",
    //             13: "zhenbang",
    //             14: "qian",
    //             15: "yiwen",
    //             16: "yinxian",
    //             17: "tu",
    //             18: "yi",
    //             19: "weiqu",
    //             20: "huaxin",
    //             21: "hu",
    //             22: "xiaonian",
    //             23: "neng",
    //             24: "taikaixin",
    //             25: "huaji",
    //             26: "mianqiang",
    //             27: "kuanghan",
    //             28: "guai",
    //             29: "shuijiao",
    //             30: "jinku",
    //             31: "shengqi",
    //             32: "jinya",
    //             33: "pen",
    //             34: "aixin",
    //             35: "xinsui",
    //             36: "meigui",
    //             37: "liwu",
    //             38: "caihong",
    //             39: "xxyl",
    //             40: "taiyang",
    //             41: "qianbi",
    //             42: "dnegpao",
    //             43: "chabei",
    //             44: "dangao",
    //             45: "yinyue",
    //             46: "haha2",
    //             47: "shenli",
    //             48: "damuzhi",
    //             49: "ruo",
    //             50: "OK"
    //         },
    //         title: {
    //             1: "呵呵",
    //             2: "哈哈",
    //             3: "吐舌",
    //             4: "啊",
    //             5: "酷",
    //             6: "怒",
    //             7: "开心",
    //             8: "汗",
    //             9: "泪",
    //             10: "黑线",
    //             11: "鄙视",
    //             12: "不高兴",
    //             13: "真棒",
    //             14: "钱",
    //             15: "疑问",
    //             16: "阴脸",
    //             17: "吐",
    //             18: "咦",
    //             19: "委屈",
    //             20: "花心",
    //             21: "呼~",
    //             22: "笑脸",
    //             23: "冷",
    //             24: "太开心",
    //             25: "滑稽",
    //             26: "勉强",
    //             27: "狂汗",
    //             28: "乖",
    //             29: "睡觉",
    //             30: "惊哭",
    //             31: "生气",
    //             32: "惊讶",
    //             33: "喷",
    //             34: "爱心",
    //             35: "心碎",
    //             36: "玫瑰",
    //             37: "礼物",
    //             38: "彩虹",
    //             39: "星星月亮",
    //             40: "太阳",
    //             41: "钱币",
    //             42: "灯泡",
    //             43: "茶杯",
    //             44: "蛋糕",
    //             45: "音乐",
    //             46: "haha",
    //             47: "胜利",
    //             48: "大拇指",
    //             49: "弱",
    //             50: "OK"
    //         }
    //     }, {
    //         name: "QQ高清",
    //         path: "/dist/emoji/src/img/qq/",
    //         maxNum: 91,
    //         excludeNums: [41, 45, 54],
    //         file: ".gif",
    //         placeholder: "#qq_{alias}#"
    //     }, {
    //         name: "emoji高清",
    //         path: "/dist/emoji/src/img/emoji/",
    //         maxNum: 84,
    //         file: ".png",
    //         placeholder: "#emoji_{alias}#"
    //     }]
    // });
    $("#content").emoji({
        button: "#emoji",
        showTab: true,
        position: 'topRight',
        animation: 'slide',
        icons: [{
            name: "QQ表情",
            path: "/dist/emoji/src/img/qq/",
            maxNum: 91,
            excludeNums: [41, 45, 54],
            file: ".gif"
        }]
    });
</script>
</body>
