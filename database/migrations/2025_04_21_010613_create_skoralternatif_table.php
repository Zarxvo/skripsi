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
        Schema::create('skoralternatif', function (Blueprint $table) {
            $table->id();
            $table->foreignId('alternatif_id')->constrained('alternatif')->onDelete('cascade');
            $table->foreignId('kriteria_id')->constrained('kriteria')->onDelete('cascade');
            $table->foreignId('subkriteria_id')->constrained('subkriteria')->onDelete('cascade');
            $table->timestamps();;
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('skoralternatif');
    }
};
