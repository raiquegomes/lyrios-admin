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
        Schema::create('ticket_pagamento_financeiros', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->boolean('status');
            $table->integer('tips_note_types_id');
            $table->longText('description');
            $table->integer('filial_id');
            $table->integer('user_id_closure');
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
        Schema::dropIfExists('ticket_pagamento_financeiros');
    }
};
