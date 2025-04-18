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
        Schema::create('seeker_experiences', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('company')->nullable();
            $table->string('start_date')->nullable();
            $table->string('end_date')->nullable();
            $table->unsignedBigInteger('seeker_id')->nullable();
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
        Schema::dropIfExists('seeker_experiences');
    }
};
