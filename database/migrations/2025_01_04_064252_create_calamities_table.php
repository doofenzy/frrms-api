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
        Schema::create('calamities', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('severity_level');
            $table->string('cause');
            $table->string('alert_level');
            $table->string('status');
            $table->dateTime('date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('calamities');
    }
};
