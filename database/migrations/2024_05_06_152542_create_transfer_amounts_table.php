<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

  public function up(): void {
    Schema::create('transfer_amounts', function (Blueprint $table) {

      $table->id();

      $table->foreignId('transfer_transaction_id')->constrained('transfer_transactions');
      $table->foreignId('sender_id')->constrained('users');

      $table->foreignId('sent_currency_type_id')->index()->constrained('currencies');
      $table->foreignId('received_currency_type_id')->index()->constrained('currencies');
      $table->foreignId('total_paid_currency_type_id')->index()->constrained('currencies');

      $table->decimal('sent_amount');
      $table->decimal('received_amount');
      $table->decimal('total_paid_amount');

      $table->decimal('app_fees')->default(0);
      $table->decimal('added_value')->default(0);

      $table->enum('status', ['pending', 'fail', 'success'])->default('pending');

      $table->timestamps();

    });

  }

  public function down(): void {
    Schema::dropIfExists('transfer_amounts');
  }
};
