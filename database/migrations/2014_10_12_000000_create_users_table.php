<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chat_user', function (Blueprint $table) {

            $table->increments('id');
            $table->string('nickname')->default('')->comment('用户昵称');
            $table->string('password')->default('')->comment('用户密码');
            $table->string('open_id')->default('')->comment('第三方ID');
            $table->string('mobile_num')->default('')->comment('用户手机号码');
            $table->string('last_login_ip')->default('')->comment('用户登录ip');
            $table->integer('last_login_time')->comment('用户上次登录时间');
            $table->string('email')->default('')->comment('用户邮箱');
            $table->string('access_token')->default('')->comment('access_token');
            $table->string('avatar')->default('')->comment('用户头像');
            $table->text('desc')->default('')->comment('个人描述');
            $table->string('city')->default('')->comment('个人城市');
            $table->string('website')->default('')->comment('个人网址');
            $table->tinyinteger('status')->default('1')->comment('用户状态 1:正常 2:冻结');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
