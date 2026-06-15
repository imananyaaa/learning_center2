<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->text('deskripsi');
            $table->date('tanggal');
            $table->time('waktu');
            $table->string('lokasi');
            $table->enum('jenis', ['internal','eksternal'])->default('internal');
            $table->integer('kuota')->nullable();
            $table->enum('status', ['aktif','selesai','dibatalkan'])->default('aktif');
            $table->string('foto')->nullable();
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('events'); }
};
