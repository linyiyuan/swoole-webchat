<?php

namespace App\Models\Home;

use Illuminate\Database\Eloquent\Model;

class ChatUser extends Model
{
    /**
     * @var string
     * 指定表名
     */
    protected $table = 'chat_user';

    /**
     * @var bool
     * 是否自动更新时间戳
     */
    public $timestamps = true;

    /**
     * 添加/修改用户数据
     *
     * @param array $data
     * @param bool $isEdit
     * @param array $condition
     * @return bool|int
     */
    public static function setChatUser($data = [], $isEdit = false, $condition = [])
    {
        if (empty($data)) return false;

        //判断是否修改
        if ($isEdit) {
            if (empty($condition)) return false;
            $data['updated_at'] = date('Y-m-d H:i:s', time());

            $result = static::query()->where($condition)
                ->update($data);
        }else{

            $data['created_at'] = date('Y-m-d H:i:s', time());
            $data['updated_at'] = date('Y-m-d H:i:s', time());
            $result = static::query()->insertGetId($data);
        }

        return $result;
    }

    /**
     * 根据邮箱获取用户信息
     *
     * @param string $email
     * @return array|\Illuminate\Database\Eloquent\Builder|Model|object|null
     */
    public static function getInfoByEmail(string $email)
    {
        if (empty($email)) return [];

        return static::query()->where('email', $email)->first();
    }

    /**
     * 根据用户ID获取信息
     *
     * @param int $uid
     * @return array|\Illuminate\Database\Eloquent\Builder|Model|object|null
     */
    public static function getInfoById(int $uid)
    {
        if (empty($uid)) return [];

        return static::query()->where('id', $uid)->first();
    }
}
