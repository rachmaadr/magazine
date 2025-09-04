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
        Schema::table('artikel_news', function (Blueprint $table) {
             $table->dropForeign(['category_id']);
            $table->dropForeign(['author_id']);
            
            // Tambahkan constraints baru dengan restrict
            $table->foreign('category_id')
                  ->references('id')
                  ->on('categories')
                  ->onDelete('restrict');
                  
            $table->foreign('author_id')
                  ->references('id')
                  ->on('authors')
                  ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('restrict', function (Blueprint $table) {
            //
        });
    }
};
