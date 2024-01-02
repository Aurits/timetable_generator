<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */

    public function up()
    {
        Schema::create('timetable_entries', function (Blueprint $table) {
            $table->id();
            $table->string('day');
            $table->string('time_slot');
            $table->foreignId('classroom_id')->constrained();
            $table->foreignId('subject_id')->constrained();
            $table->foreignId('teacher_id')->constrained();
            // Add other relevant fields
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('timetable_entries');
    }
};