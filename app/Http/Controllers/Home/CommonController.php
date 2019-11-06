<?php
namespace App\Http\Controllers\Home;

use App\Http\Controllers\BaseController;

/**
 * Class CommonController
 * @package App\Http\Controllers\Api
 * @Author YiYuan-LIn
 * @Date: 2019/4/10
 * 接口公共实现类
 */
abstract class CommonController extends BaseController
{
    /**
     * 对异常进行处理并返回
     *
     * @param \Exception $e
     * @param string $url
     * @return \Illuminate\Http\RedirectResponse
     */
    public function webErrorExp(\Exception $e, string $url = '')
    {
        if (!$e->getCode()) {
            $code = 500;
            $message = '服务器错误 ' . $e->getMessage() . ':: FILE:' . $e->getFile() . ':: LINE: ' . $e->getLine();
        } else {
            $code = $e->getCode();
            $message = $e->getMessage();
        }
        return $this->webErrorResponse($code, $message, $url);
    }

    /**
     * Web 错误响应
     *
     * @param int $code
     * @param string $message
     * @param string $url
     * @return \Illuminate\Http\RedirectResponse
     */
    public function webErrorResponse(int $code, string $message, string $url = '')
    {
        if (empty($url))  return redirect()->back()->with('message',['code' => $code,'message' => $message]);

        return redirect($url)->with('message',['code' => $code, 'message' => $message]);
    }

    /**
     * Web 正确响应
     *
     * @param string $message
     * @param string $url
     * @return \Illuminate\Http\RedirectResponse
     */
    public function webSuccessResponse(string $message, string $url = '')
    {
        if (empty($url))   return redirect()->back()->with('message',['code' => 200, 'message' => $message]);

        return redirect($url)->with('message',['code' => 200, 'message' => $message]);
    }

    /**
     * @Author YiYuan-LIn
     * @Date: 2019/4/10
     * @param string $data
     * @return mixed
     * @description 对象转为数组
     */
    public function toArray($data = '')
    {
        return json_decode(json_encode($data), true);
    }

    /**
     * @Author YiYuan-LIn
     * @Date: 2019/4/10
     * @return false|int|string
     * @description 得到当前日期的零点时间
     */
    public function getNowTime()
    {
        $todayTime = date('Y-m-d', time());//获取当天时间
        $todayTime = strtotime($todayTime);

        return $todayTime;
    }

    /**
     * @Author YiYuan-LIn
     * @Date: 2019/4/10
     * @param $url
     * @return bool|string
     * @description 用来判断远程文件是否存在
     */
    public function getUrlExists($url)
    {
        if (!isset($url)) {
            return '请输入要验证的url';
        }
        $ch = curl_init();
        $timeout = 10;
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
        $contents = curl_exec($ch);
        if (preg_match("/404/", $contents)) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * @Author YiYuan-LIn
     * @Date: 2019/5/8
     * @param $num
     * @return string
     * @description 根据数量获取随机验证码
     */
    public function randNum($num){
        $code = "";
        for ($i=0; $i < $num; $i++) {
            $code = $code . rand(1, 9);
        }
        return $code;
    }
}
