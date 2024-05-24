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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->nullable();
            $table->longText('review')->nullable();
            $table->double('rating')->nullable();
            $table->double('review_communication')->nullable();
            $table->double('review_recommend')->nullable();
            $table->double('review_described')->nullable();
            $table->timestamp('date');
            $table->string('thumbnail')->nullable();

            $table->unsignedBigInteger('review_type_id')->nullable();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->string('review_url')->nullable();
            $table->string('website')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->boolean('status')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
