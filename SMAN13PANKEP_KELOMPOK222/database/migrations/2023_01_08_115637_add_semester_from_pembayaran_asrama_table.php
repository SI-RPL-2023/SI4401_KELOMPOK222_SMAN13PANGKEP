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
        Schema::table('pembayaran_asramas', function (Blueprint $table) {
            $table->integer('semester');
            $table->renameColumn('tahun','tahun_ajaran');
        });
        Schema::table('pembayaran_asramas', function (Blueprint $table) {
            $table->string('tahun_ajaran')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pembayaran_asramas', function (Blueprint $table) {
            $table->dropColumn('semester');
            $table->renameColumn('tahun_ajaran','tahun');
        });
        Schema::table('pembayaran_asramas', function (Blueprint $table) {

            $table->integer('tahun')->change();
        });
    }
};
