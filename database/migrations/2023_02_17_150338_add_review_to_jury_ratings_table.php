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
        Schema::table('jury_ratings', function (Blueprint $table) {
            $table->unsignedBigInteger('review_id')->nullable()->after('orchestra_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('jury_ratings', function (Blueprint $table) {
            //
        });
    }
};
