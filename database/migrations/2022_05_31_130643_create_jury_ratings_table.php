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
        Schema::create('jury_ratings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('jury_id');
            $table->foreign('jury_id')
            ->references('id')
            ->on('users');
            $table->unsignedBigInteger('category_id')->nullable();
            $table->foreign('category_id')
            ->references('id')
            ->on('categories');
            $table->unsignedBigInteger('rate_id')->nullable();
            $table->foreign('rate_id')
            ->references('id')
            ->on('ratings');
            $table->unsignedBigInteger('orchestra_id')->nullable();
            $table->foreign('orchestra_id')
            ->references('id')
            ->on('orchestras');
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
        Schema::dropIfExists('jury_ratings');
    }
};
