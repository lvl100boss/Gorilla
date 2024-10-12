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
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained(); //guests will be excempted from this
            $table->foreignId('product_id')->constrained();
            $table->string('name');
            $table->string('image');
            $table->string('category');
            $table->text('description')->nullable();
            $table->integer('price');
            $table->integer('discount')->nullable();
            $table->integer('stock');
            $table->integer('quantity')->default(1);
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carts');
    }
};
