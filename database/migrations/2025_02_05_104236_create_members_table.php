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
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('fname');
            $table->string('lname');
            $table->string('mname');
            $table->string('suffix');
            $table->integer('zone');
            $table->integer('lot');
            $table->string('status');
            $table->string('phone_number');
            $table->string('religion');
            $table->string('birthdate');
            $table->integer('age');
            $table->string('gender');
            $table->string('occupation');
            $table->string('group');
            $table->string('relationship');
            $table->integer('infant');
            $table->integer('toddlers');
            $table->integer('preschool');
            $table->integer('schoolAge');
            $table->integer('teenAge');
            $table->integer('adult');
            $table->integer('seniorCitizen');
            $table->integer('lactatingMothers');
            $table->integer('pregnant');
            $table->integer('pwd');
            $table->integer('soloParent');
            $table->integer('head_id');
            $table->integer('evacuation_center_id')->nullable();
            $table->integer('calamity_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};
