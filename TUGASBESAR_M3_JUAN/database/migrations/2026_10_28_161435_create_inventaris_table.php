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
    Schema::create('inventaris', function (Blueprint $table) {
        $table->id('id_inventaris');
        $table->string('nama_barang');
        $table->string('merek');
        $table->enum('kondisi', ['Bagus', 'Rusak Ringan', 'Rusak Berat'])->default('Bagus');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventaris');
    }
};
