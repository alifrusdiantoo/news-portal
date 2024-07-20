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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('img');
            $table->string('title');
            $table->foreignId('author_id')->constrained(
                table: 'users',
                indexName: 'articles_author_id'
            );
            $table->text('content');
            $table->foreignId('category_id')->constrained(
                table: 'categories',
                indexName: 'articles_category_id'
            );
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
