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
        Schema::create('tours', function (Blueprint $table) {
            $table->id();
            $table->foreignId('location_id')->index()->constrained();
            $table->foreignId('category_id')->index()->constrained();
            $table->string('name');
            $table->string('slug');
            $table->string('img');
            $table->string('duration');
            $table->string('price');
            $table->longText('desc');
            $table->longText('itinerary');
            $table->longText('facility');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tours');
    }
};
