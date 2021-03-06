<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FkRespPrivadas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('resp_privadas', function (Blueprint $table) {
            $table->foreign('id_user1')->references('id')->on('users');
            $table->foreign('id_user2')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('resp_privadas', function (Blueprint $table) {
            $table->dropColumn('id_user1');
            $table->dropColumn('id_user2');
        });
    }
}
