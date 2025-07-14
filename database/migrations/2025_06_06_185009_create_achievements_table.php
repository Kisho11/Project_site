<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('achievements', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('title_ta')->nullable(); // Tamil title
            $table->longText('description')->nullable(); // Max text size for description
            $table->longText('description_ta')->nullable(); // Max text size for Tamil description
            $table->string('image'); // Path to the image
            $table->date('date'); // Achievement date
            $table->timestamps(); // Includes created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('achievements');
    }
};
