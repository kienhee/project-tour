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
        Schema::create('tours', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('slug');
            $table->string('cover');
            $table->text('content');
            $table->string('starting_point');
            $table->timestamp('date_of_department')->useCurrent();
            $table->timestamp('return_date')->useCurrent();
            $table->integer('amount_of_people');
            $table->integer('avaiable');
            $table->integer('price_large');
            $table->integer('price_small');
            $table->integer('vehicle_id');
            $table->string('road_map');
            $table->integer('destination_id');
            $table->softDeletes();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tours');
    }
};
