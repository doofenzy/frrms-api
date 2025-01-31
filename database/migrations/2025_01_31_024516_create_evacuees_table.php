<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvacueesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('evacuees', function (Blueprint $table) {
            $table->id();
            $table->string('head_family');
            $table->integer('infant');
            $table->integer('toddlers'); 
            $table->integer('preschool');
            $table->integer('school_age');
            $table->integer('teen_age'); 
            $table->integer('adult');
            $table->integer('senior_citizen');
            $table->integer('total_persons');
            $table->integer('lactating_mothers'); 
            $table->integer('pregnant');
            $table->integer('pwd');
            $table->integer('solo_parent'); 
            $table->unsignedBigInteger('evacuation_center_id'); // Foreign key
            $table->timestamps();

            // Define the foreign key constraint
            $table->foreign('evacuation_center_id')->references('id')->on('evacuation_centers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evacuees');
    }
}
