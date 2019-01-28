<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sites', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->nullable()->comment('站点标题');
            $table->string('keywords')->nullable()->comment('站点关键字');
            $table->string('description')->nullable()->comment('站点描述');
            $table->string('hello')->nullable()->comment('问候语');
            $table->string('weixin')->nullable()->comment('微信');
            $table->string('about')->nullable()->coment('联系我们');
            $table->string('service')->nullable()->coment('联系客服');
            $table->string('logo')->nullable()->coment('logo');
            $table->string('mobile')->nullable()->coment('文本联系电话');
            $table->integer('number1')->nullable()->coment('成功办理服务基数');
            $table->integer('number2')->nullable()->coment('服务办理案件基数');
            $table->integer('number3')->nullable()->coment('资质办理类型基数');
            $table->string('title1')->nullable()->coment('资质服务标题前');
            $table->string('title1_1')->nullable()->coment('资质服务标题后');
            $table->string('title1_2')->nullable()->coment('资质服务标题简介');
            $table->string('title2')->nullable()->coment('标准化流程标题');
            $table->string('title2_1')->nullable()->coment('标准化流程标题简介');
            $table->string('title3')->nullable()->coment('了解标题前');
            $table->string('title3_1')->nullable()->coment('了解标题后');
            $table->string('title3_2')->nullable()->coment('了解标题简介');
            $table->string('title4')->nullable()->coment('合作机构');
            $table->string('copyright')->nullable()->coment('版权');
            $table->text('statistical_code')->nullable()->coment('统计代码');
            $table->text('leyu')->nullable()->coment('百度商桥');
            $table->string('leyu_url')->nullable()->coment('百度商桥独立沟通链接');
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
        Schema::dropIfExists('sites');
    }
}
