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
        Schema::create('orchestra_in_reviews', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('orchestra_id');
            $table->foreign('orchestra_id')
            ->references('id')
            ->on('orchestras');
            $table->integer('rating')->nullable();
            $table->unsignedBigInteger('review_id');
            $table->foreign('review_id')
            ->references('id')
            ->on('orchester_reviews');
            $table->unsignedBigInteger('status_id');
            $table->foreign('status_id')
            ->references('id')
            ->on('status_members');
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
        Schema::dropIfExists('orchestra_in_reviews');
    }
};
