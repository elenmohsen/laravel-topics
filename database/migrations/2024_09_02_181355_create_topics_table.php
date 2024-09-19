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
        Schema::create('topics', function (Blueprint $table) {
            $table->id();
            $table->string('topicTitle');
            $table->text('content');
            $table->integer('no_of_views')->default(0);
            $table->boolean('trending')->default(0);
            $table->boolean('published')->default(0);
            $table->string('image',2000);
            $table->softDeletes();
            $table->foreignId('category_id')->constrained('categories')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('topics');
    }
};
