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
    Schema::create('housekeeper', function (Blueprint $table) {
        $table->id('id_housekeeper');
        $table->string('nama_staff');
        $table->string('tugas_kebersihan');
        $table->string('area_penanganan');
        $table->string('no_hp');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('housekeeper');
    }
};
