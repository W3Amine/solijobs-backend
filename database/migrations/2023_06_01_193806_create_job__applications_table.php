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
        Schema::create('Jobs_Applications', function (Blueprint $table) {
            $table->unsignedBigInteger('job_id');
            $table->unsignedBigInteger('candidate_profile_id');
            $table->timestamps();
            $table->primary(['job_id', 'candidate_profile_id']);
            $table->foreign('job_id')->references('id')
                ->on('jobs')->onDelete('cascade');
            $table->foreign('candidate_profile_id')->references('id')
                ->on('candidate_profiles')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Jobs_Applications');
    }
};