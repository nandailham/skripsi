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
        Schema::create('penanggung_jawab', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('email')->unique();
            $table->string('hubungan');
            $table->string('nomor_telepon');
            $table->string('jenis_kelamin');
            $table->timestamps();
        });

        Schema::create('penanggung_jawab_scope', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pasien_id')->constrained('pasien')->onDelete('cascade');
        $table->foreignId('penanggung_jawab_id')->constrained('penanggung_jawab')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('penanggung_jawab_scope  ');
        Schema::dropIfExists('penanggung_jawab');
    }
};
