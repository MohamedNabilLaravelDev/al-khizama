<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

  public function up(): void {
    Schema::create('day_intervals', function (Blueprint $table) {

      $table->id();

      $table->foreignId('day_id')->index()->constrained('days');

      $table->foreignId('from_id')->index()->constrained('times');
      $table->foreignId('to_id')->index()->constrained('times');

      $table->time('from');
      $table->time('to');

      $table->timestamps();

    });

  }

  public function down(): void {
    Schema::dropIfExists('day_intervals');
  }
};
