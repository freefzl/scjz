<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('type',['new','business'])->nullable()->comment('类型');
            $table->string('title')->nullable()->comment('标题');
            $table->string('keywords')->nullable()->comment('关键词');
            $table->text('description')->nullable()->comment('描述');
            $table->text('content')->nullable()->comment('内容');
            $table->integer('click')->default(0)->comment('点击量');
            $table->string('thumb')->nullable()->comment('缩略图');
            $table->string('editor')->nullable()->comment('编辑');
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
        Schema::dropIfExists('articles');
    }
}
