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
        Schema::create('foods', function (Blueprint $table) {
            $table->id()->primary();
            $table->foreignId('merchant_id')->constrained(
                table: 'users',
                indexName: 'food_merchant_id',
            );
            $table->foreignId('category_id')->constrained(
                table: 'categories',
                indexName: 'food_category_id'
            );
            $table->string('food_name');
            $table->text('description');
            $table->string('image_url');
            $table->integer('price');
            $table->boolean('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('foods');
    }
};
