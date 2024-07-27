<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('pages', function (Blueprint $table) {
            DB::statement('ALTER TABLE pages ADD FULLTEXT page_search (title_kk, title_ru, content_kk, content_ru)');
         //   $table->fullText(['title_kk', 'title_ru', 'content_kk', 'content_ru']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pages', function (Blueprint $table) {
            $table->dropIndex('page_search');
        });
    }
};
