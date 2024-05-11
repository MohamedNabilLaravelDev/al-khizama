<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

  public function up(): void {
    Schema::create('transfer_transactions', function (Blueprint $table) {

      $table->id();

      $table->string('serial', 50)->nullable();

      $table->foreignId('sender_id')->index()->constrained('users');

      $table->foreignId('receive_city_id')->index()->constrained('cities');
      $table->foreignId('interval_id')->index()->constrained('day_intervals');

      $table->foreignId('total_paid_currency_type_id')->nullable()->index()->constrained('currencies');

      $table->enum('type', ['self', 'other']);

      $table->string('sender_name');
      $table->string('sender_phone_key');
      $table->string('sender_phone');
      $table->string('sender_id_image');

      $table->string('receiver_name')->nullable();
      $table->string('receiver_phone_key')->nullable();
      $table->string('receiver_phone')->nullable();
      $table->string('receiver_id_image')->nullable();

      $table->string('area_num')->nullable();
      $table->string('street_name');
      $table->string('house_num');
      $table->string('avenue')->nullable();

      $table->decimal('total_paid_amount')->nullable();

      $table->decimal('app_fees')->default(0);
      $table->decimal('added_value')->default(0);

      $table->date('receive_date');

      $table->enum('status', ['pending', 'fail', 'success'])->default('pending');

      $table->enum('payment_method', ['cash', 'online', 'Visa'])->default('online');
      $table->text('payment_token')->nullable();
      $table->dateTime('payment_date')->nullable();

      $table->timestamps();

    });

  }

  public function down(): void {
    Schema::dropIfExists('transfer_transactions');
  }
};
