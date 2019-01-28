<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('phone')->nullable()->comment('电话');
            $table->string('status')->default(0)->comment('状态');
            $table->string('name')->nullable()->comment('姓名');
            $table->string('appointment')->nullable()->comment('预约');
            $table->string('visit_time')->nullable()->comment('回访时间');
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
        Schema::dropIfExists('messages');
    }
}
