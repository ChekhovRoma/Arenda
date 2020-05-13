<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('places', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->string('city');
            $table->string('address');
            $table->unsignedBigInteger('place_type_id');
            $table->foreign('place_type_id')->references('id')->on('place_types');
            $table->integer('floors_num')->default(1);
            $table->integer('rooms_num');
            $table->string('phone');
            $table->string('description')->nullable();
            $table->time('open_at');
            $table->time('closed_at');
            $table->json('photos')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('places');
    }
}
