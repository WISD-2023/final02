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
        Schema::create('used_books', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('category_id');
            $table->string('name');
            $table->string('author');
            $table->string('pp');
            $table->unsignedBigInteger('isbn');
            $table->string('book_image');
            $table->string('book_state');
            $table->unsignedBigInteger('price');
            $table->string('description');
            $table->unsignedBigInteger('pay_type');
            $table->unsignedBigInteger('trade_place');
            $table->datetime('trade_at');
            $table->unsignedBigInteger('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('used_books');
    }
};
