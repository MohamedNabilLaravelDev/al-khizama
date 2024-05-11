<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

  public function up(): void {
    Schema::create('currencies', function (Blueprint $table) {

      $table->id();

      $table->text('name');

      $table->text('country_name');
      $table->string('country_flag')->nullable();
      $table->string('code')->unique();

      $table->decimal('selling_price');
      $table->decimal('buying_price');

      $table->boolean('is_available');
      $table->boolean('is_default');

      $table->timestamps();

    });

  }

  public function down(): void {
    Schema::dropIfExists('currencies');
  }
};
