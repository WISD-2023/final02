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
        Schema::create('new_books', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('isbn');
            $table->integer('category_id');
            $table->string('name');
            $table->string('author');
            $table->string('pp');
            $table->unsignedBigInteger('quantity');
            $table->unsignedBigInteger('price');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('new_books');
    }
};
