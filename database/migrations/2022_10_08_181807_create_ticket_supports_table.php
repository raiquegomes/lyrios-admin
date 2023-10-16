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
        Schema::create('ticket_supports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->integer('filial');
            $table->boolean('status');
            $table->integer('motived');
            $table->boolean('user_id_closure')->default('');
            $table->longText('description')->nullable();
            $table->longText('name_operator');
            $table->boolean('section')->nullable();
            $table->timestamps();
        });

        Schema::create('ticket_support_items', function (Blueprint $table) {
            $table->id();
            $table->string('EAN');
            $table->date('date_validated');
            $table->integer('Qty');
            $table->string('name');
            $table->foreignId('ticket_support_id');
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
        Schema::dropIfExists('ticket_supports');
        Schema::dropIfExists('ticket_support_items');
    }
};
