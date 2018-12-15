<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type_id')->nullable()->comment('所属分类');
            $table->string('tag')->nullable()->comment('标签');
            $table->string('img')->nullable()->comment('图片');
            $table->string('title')->nullable()->comment('标题');
            $table->string('abstract')->nullable()->comment('简述');
            $table->text('introduce')->nullable()->comment('服务介绍');
            $table->text('security')->nullable()->comment('服务保障');
            $table->text('commitment')->nullable()->comment('承诺');
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
        Schema::dropIfExists('products');
    }
}
