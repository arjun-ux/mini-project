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
        Schema::create('kambings', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->integer('no_kambing')->nullable();
            $table->json('riwayat_pemeriksaan')->nullable();
            $table->softDeletes('deleted_at')->nullable();
            $table->unsignedBigInteger('kandang_id')->nullable();
            $table->string('fileKambing')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kambings');
    }
};
