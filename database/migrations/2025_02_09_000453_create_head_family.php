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
        Schema::create('head_family', function (Blueprint $table) {
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
            $table->string('four_p');
            $table->string('gov_id');
            $table->string('brgy');
            $table->string('relationship');
            $table->string('evacuation_type');
            $table->integer('evacuee_family_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('head_family');
    }
};
