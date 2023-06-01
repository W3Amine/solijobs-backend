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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employer_id');
            $table->unsignedBigInteger('category_id')->nullable();
            $table->unsignedBigInteger('location_id')->nullable();
            $table->string('title');
            $table->longText('description');
            $table->decimal('salary', 10, 2)->nullable();
            $table->string('type');
            $table->boolean('is_active')->default(false);
            $table->string('gender');
            $table->string('experience')->nullable();
            $table->string('qualification')->nullable();
            $table->string('address')->nullable();

            $table->timestamps();


            $table->foreign('employer_id')
                ->references('id')->on('employer_profiles')
                ->onDelete('CASCADE');


            $table->foreign('category_id')
                ->references('id')->on('categories')
                ->onDelete('SET NULL');

            $table->foreign('location_id')
                ->references('id')->on('locations')
                ->onDelete('SET NULL');



        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};