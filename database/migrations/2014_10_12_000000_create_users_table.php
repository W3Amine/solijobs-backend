<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Manager;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phoneNumber')->nullable()->unique();
            $table->string('password');
            $table->tinyInteger('role')->unsigned()->default(2);
            $table->string('profileImage')->default('uploads/images/profileImages/defaultProfile.jpg');
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    // roles :
    // 0 => admin
    // 1 => Manager 
    // 2 => candidate 
    // 3 => employer 

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};