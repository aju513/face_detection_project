<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reschedule', function (Blueprint $table) {
            $table->id();
            $table->foreignId('teacher_subject_id')->constrained('teacher_subjects');  // Foreign Key to Teacher_Subjects
            $table->date('reschedule_date');
            $table->time('new_start_time')->nullable();  // Optional new start time
            $table->time('new_end_time')->nullable();  // Optional new end time
            $table->text('reason')->nullable();  // Reason for the change
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reschedule');
    }
};
