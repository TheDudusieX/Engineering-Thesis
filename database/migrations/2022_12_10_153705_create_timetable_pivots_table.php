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
        Schema::create('timetable_pivots', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('orchestra_id');
            $table->foreign('orchestra_id')
            ->references('id')
            ->on('orchestras');
            $table->Time('performance_time');
            $table->unsignedBigInteger('timetable_id');
            $table->unsignedBigInteger('status_id');
            $table->foreign('status_id')
            ->references('id')
            ->on('status_shows');
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
        Schema::dropIfExists('timetable_pivots');
    }
};
