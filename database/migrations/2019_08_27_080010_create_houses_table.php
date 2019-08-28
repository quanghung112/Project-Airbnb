<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHousesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('houses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('style');
            $table->string('loan_type');
            $table->string('address')->nullable();
            $table->string('city');
            $table->string('district');
            $table->string('sub_district');
            $table->integer('bedroom')->nullable();
            $table->integer('bathroom')->nullable();
            $table->integer('price');
            $table->string('convenient')->nullable();
            $table->text('description')->nullable();
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
        Schema::dropIfExists('houses');
    }
}
