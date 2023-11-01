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
        Schema::table('book_tours', function (Blueprint $table) {
            $table->integer('sale')->default(0);
            $table->string('notes')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('book_tours', function (Blueprint $table) {
            $table->dropColumn('sale');
            $table->string('notes')->nullable()->change(false);
        });
    }
};
