<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

  public function up(): void {
    Schema::create('offers', function (Blueprint $table) {
      $table->id();

      $table->text('title');
      $table->longText('description')->nullable();

      $table->string('image', 50)->default('default.png');

      $table->boolean('is_available')->default(true);

      $table->timestamps();
    });
  }

  public function down(): void {
    Schema::dropIfExists('offers');
  }
};
