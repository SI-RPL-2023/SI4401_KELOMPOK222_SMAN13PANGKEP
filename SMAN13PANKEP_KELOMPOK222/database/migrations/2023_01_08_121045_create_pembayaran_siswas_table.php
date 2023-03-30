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
        Schema::create('pembayaran_siswas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pembayaran_asrama_id')->constrained('pembayaran_asramas')->cascadeOnDelete();
            $table->foreignId('metode_pembayaran_id')->constrained('metode_pembayarans')->cascadeOnDelete();
            $table->foreignId('siswa_id')->constrained('siswas')->cascadeOnDelete();
            $table->biginteger('nominal');
            $table->enum('status',['paid','unpaid','process'])->default('process');
            $table->string('bukti')->nullable();
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
        Schema::dropIfExists('pembayaran_siswas');
    }
};
