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
        Schema::create('energies', function (Blueprint $table) {
            $table->id();
            $table->String('ampere');
            $table->String('voltage');
            $table->String('watt');
            $table->String('ruangan');
            $table->dateTime('update_time');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('energies');
    }
};
