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
        Schema::create('jury_in_reviews', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('jury_id');
            $table->foreign('jury_id')
            ->references('id')
            ->on('users');
            $table->unsignedBigInteger('orchester_reviews_id');
            $table->foreign('orchester_reviews_id')
            ->references('id')
            ->on('orchester_reviews');

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
        Schema::dropIfExists('jury_in_reviews');
    }
};
