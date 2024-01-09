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
        Schema::create('new_book_carts_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('new_book_cart_id');//new_books_cart
            $table->unsignedBigInteger('new_book_id');//new_books
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('new_book_carts_items');
    }
};
