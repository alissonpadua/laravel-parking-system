<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('moviment_id');
            $table->foreign('moviment_id')->references('id')->on('moviments')->onDelete('cascade');
            $table->decimal('price', 8, 2);
            $table->string('cpfcliente');
            $table->string('namecliente');
            $table->string('vehiclemodel');
            $table->string('vehicleplate');
            $table->decimal('discount', 8, 2);
            $table->datetime('inputed_at');
            $table->datetime('leaved_at');
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
        Schema::dropIfExists('payments');
    }
}
