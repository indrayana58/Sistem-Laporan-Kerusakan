<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('laporans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('nama');
            $table->string('no_telp');
            $table->string('nama_barang');
            $table->string('lokasi');
            $table->date('tanggal');
            $table->string('foto_barang');
            $table->string('keterangan');
            $table->boolean('disetujui')->default(false);
            $table->timestamps();

            // Nama kunci asing diubah menjadi "laporan_user_id_foreign"
            $table->foreign('user_id', 'laporan_user_id_foreign')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporans');
    }
};
