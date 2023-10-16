<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('to_do_list_tasks', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->integer('section');
            $table->text('description')->nullable();
            $table->text('observation')->nullable();
            $table->timestamp('start_task_date')->nullable();
            $table->timestamp('end_task_date')->nullable();
            $table->timestamp('completed_at')->nullable();
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
        Schema::dropIfExists('to_do_list_tasks');
    }
};
