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
        Schema::create('orchester_reviews', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->integer('maximum_number_of_orchestras');
            $table->integer('current_number_of_orchestras');
            $table->date('term');
            $table->time('start_time');
            $table->string('place');
            $table->string('organizer');
            $table->date('deadline');
            $table->unsignedBigInteger('status_id');
            $table->foreign('status_id')
            ->references('id')
            ->on('statuses');
            $table->longText('information')->nullable();
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
        Schema::dropIfExists('orchester_reviews');
    }
};
