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
        Schema::create('school_orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('book_cart_id');//new_books_cart
            $table->boolean('payment')->default(false);
            $table->unsignedBigInteger('handler_id')->nullable();
            $table->unsignedBigInteger('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('school_orders');
    }
};
