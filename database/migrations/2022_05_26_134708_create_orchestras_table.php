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
        Schema::create('orchestras', function (Blueprint $table) {
            $table->id();
            $table->string('orchestraname');
            $table->integer('numberofmembers')->nullable();
            $table->string('bandmaster')->nullable();
            $table->string('president')->nullable();
            $table->string('headquarter')->nullable();
            $table->longText('description')->nullable();
            $table->unsignedBigInteger('agent_id');
            $table->foreign('agent_id')
            ->references('id')
            ->on('users');
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
        Schema::dropIfExists('orchestras');
    }
};
