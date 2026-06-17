<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('event', function (Blueprint $table) {

            $table->string('lokasi')
                  ->nullable()
                  ->after('tanggal');

            $table->string('status')
                  ->default('akan_datang')
                  ->after('lokasi');

        });
    }

    public function down(): void
    {
        Schema::table('event', function (Blueprint $table) {

            $table->dropColumn([
                'lokasi',
                'status'
            ]);

        });
    }
};
