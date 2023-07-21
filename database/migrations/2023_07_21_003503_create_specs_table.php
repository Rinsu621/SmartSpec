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
        Schema::create('specs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('image');
            $table->foreignId('brand_id')->constrained();
            $table->string('price');
            $table->date('launch')->nullable();
            $table->string('color');
            $table->string('processor');
            $table->string('ram');
            $table->string('storage');
            $table->string('display');
            $table->string('camera');
            $table->string('battery');
            $table->string('resistance');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('specs');
    }
};
