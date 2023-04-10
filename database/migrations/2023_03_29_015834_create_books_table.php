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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('book_code')->nullable()->default('gmp-');
            $table->string('title');
            $table->string('writer')->nullable();
            $table->string('publisher')->nullable();
            $table->date('publication_year')->nullable();
            $table->integer('number_of_pages')->nullable();
            $table->text('summary')->nullable();
            $table->string('status')->default('in stock');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
