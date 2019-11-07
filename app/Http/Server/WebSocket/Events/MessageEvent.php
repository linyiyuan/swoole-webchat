<?php

namespace App\Http\Server\WebSocket\Events;

use App\Http\Server\WebSocket\InitServer;
use App\Models\Home\ChatUser;

/**
 * 信息传送事件
 *
 * @package App\Http\Server\Tcp\Events
 * @Author YiYuan-LIn
 * @Date: 2019/11/2
 */
class MessageEvent extends InitServer
{
    /**
     * 消息类型枚举
     * 1:上线通知消息类型 2:群聊
     */
    const MESSAGE_TYPE_ONLINE_REMIND = 1;
    const MESSAGE_TYPE_GROUP_CHAT = 2;


    /**
     * 客户端与WebSocket服务器建立连接时回调方法
     *
     * @param \Swoole\WebSocket\Server $server
     * @param \swoole\http\request $request
     */
    public function open(\Swoole\WebSocket\Server $server, \swoole\http\request $request)
    {
        $this->_serv = $server;

        //获取用户信息，设置用户客户端连接标识
        $userInfo = json_decode($request->cookie['COOKIE:USER_INFO'], true);
        $userUpdateInfo['fd'] = $request->fd;
        ChatUser::setChatUser($userUpdateInfo, true, ['id' => $userInfo['id']]);

        //用户上线广播通知
        $this->onLineBroadcast($server, $userInfo);

    }

    /**
     * 当服务器收到来自客户端的数据帧时会回调此方法
     *
     * @param \swoole\websocket\server $server
     * @param \swoole\websocket\frame $frame
     */
    public function message(\swoole\websocket\server $server, \swoole\websocket\frame $frame)
    {
        $type = json_decode($frame->data, true)['type'];

        switch ($type) {
            case self::MESSAGE_TYPE_GROUP_CHAT :
                $this->groupChat($server, $frame);
                break;
        }
    }

    /**
     * 客户端与服务器断开连接回调方法
     *
     * @param \Swoole\WebSocket\Server $server
     * @param int $fd
     */
    public function close(\Swoole\WebSocket\Server $server, int $fd)
    {
        echo $fd . '断开连接' . PHP_EOL;

    }

    /**
     * 用户上线广播通知
     *
     * @param \Swoole\WebSocket\Server $server
     * @param array $userInfo
     */
    public function onLineBroadcast(\Swoole\WebSocket\Server $server, array $userInfo)
    {
        $message = '欢迎 ' . $userInfo['nickname'] . ' 加入聊天室';

        $data = [
            'type' => self::MESSAGE_TYPE_ONLINE_REMIND,
            'message' => $message
        ];

        foreach ($server->connections as $key => $fd) {
            $server->push($fd, json_encode($data));
        }
    }

    /**
     * 群聊
     *
     * @param \Swoole\WebSocket\Server $server
     * @param \swoole\websocket\frame $frame
     */
    public function groupChat(\Swoole\WebSocket\Server $server, \swoole\websocket\frame $frame)
    {
        $from_fd = $frame->fd;
        $data = json_decode($frame->data, true);

        $userInfo = objToArray(ChatUser::getInfoById($data['from_uid']));
        $message = $data['message'];

        $data = [
            'time' => date('Y-m-d H:i:s', time()),
            'type' => self::MESSAGE_TYPE_GROUP_CHAT,
            'from_user_info' => json_encode($userInfo),
            'to' => null,
            'message' => $message
        ];

        foreach ($server->connections as $key => $fd) {
            if ($fd == $from_fd) continue;
            $server->push($fd, json_encode($data));
        }
    }

}