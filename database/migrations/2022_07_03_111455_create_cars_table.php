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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->foreignId('manufacture_id')->references('id')->on('manufactures');
            $table->text('model')->nullable();
            $table->text('fuel_type')->nullable();
            $table->text('wheel_placement')->nullable();
            $table->text('engine_code')->nullable();
            $table->text('gearbox')->nullable();
            $table->text('body_type')->nullable();
            $table->text('color')->nullable();
            $table->integer('km')->nullable();
            $table->integer('year')->nullable();
            $table->integer('engine_displacement')->nullable();
            $table->integer('power')->nullable();



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
        Schema::dropIfExists('cars');
    }
};
