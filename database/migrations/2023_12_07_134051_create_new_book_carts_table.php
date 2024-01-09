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
        Schema::create('new_book_carts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('invite_code');
            $table->unsignedBigInteger('type');
            $table->date('deadline_at');
            $table->boolean('is_submit')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('new_book_carts');
    }
};
