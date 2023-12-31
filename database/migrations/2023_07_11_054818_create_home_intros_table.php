<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('info_sections', function (Blueprint $table) {
            $table->id();
            $table->string('page')->nullable()->default('home');
            $table->string('title')->nullable()->default('Default title text');
            $table->string('subtitle')->nullable()->default('Default subtitle text');
            $table->string('description')->nullable()->default('Default description text');
            $table->string('image')->nullable();
            $table->string('video')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('info_sections');
    }
};
