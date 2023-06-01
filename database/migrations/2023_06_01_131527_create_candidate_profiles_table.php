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
        Schema::create('candidate_profiles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->unique();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->longText('about');
            $table->string('gender', 20);
            $table->date('birthdate');
            $table->string('cv');
            $table->string('experience', 60);
            $table->string('qualification');
            $table->string('address');

            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')
                ->onDelete('SET NULL');
            ;
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidate_profiles');
    }
};