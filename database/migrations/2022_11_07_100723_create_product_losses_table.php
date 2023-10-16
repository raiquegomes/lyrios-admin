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
        Schema::create('product_losses', function (Blueprint $table) {
            $table->id();
            $table->string('Name');
            $table->integer('total_input_quantity');
            $table->integer('loss_percentage');
            $table->double('qty_loss');
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
        Schema::dropIfExists('product_losses');
    }
};
