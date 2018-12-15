<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAptitudesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aptitudes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type_id')->nullable()->comment('类型id');
            $table->string('name')->nullable()->comment('名称');
            $table->string('url')->nullable()->comment('跳转地址');
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
        Schema::dropIfExists('aptitudes');
    }
}
