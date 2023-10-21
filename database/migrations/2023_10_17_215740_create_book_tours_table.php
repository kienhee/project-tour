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
        Schema::create('book_tours', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tourId');
            $table->integer('user_id');
            $table->integer('adult');
            $table->integer('children');
            $table->integer('total');
            $table->string('notes');
            $table->string('full_name');
            $table->string('email');
            $table->string('phone_number');
            $table->string('address');
            $table->integer('price_large');
            $table->integer('price_small');
            $table->integer('status')->default(1);;
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('book_tours');
    }
};
