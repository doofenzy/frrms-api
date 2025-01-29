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
        Schema::create('evacuation_centers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('zone');
            $table->string('type'); // Public/Private
            $table->string('contact_person');
            $table->string('contact_number');
            $table->unsignedBigInteger('calamity_id'); // Foreign key
            $table->timestamps();

            // Define the foreign key constraint
            $table->foreign('calamity_id')->references('id')->on('calamities')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evacuation_centers');
    }
};
