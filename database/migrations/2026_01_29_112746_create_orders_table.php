<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();

            $table->string('order_code')->unique();

            $table->foreignId('user_id')
                  ->nullable()
                  ->constrained()
                  ->nullOnDelete();

            // DATA PEMBELI (BUY TICKET)
            $table->string('buyer_name');
            $table->string('buyer_email');
            $table->string('buyer_phone');

            $table->foreignId('ticket_id')
                  ->constrained()
                  ->cascadeOnDelete();

            $table->integer('qty');
            $table->decimal('total_price', 12, 2);

            $table->enum('payment_method', ['dana', 'gopay', 'ovo'])
                  ->nullable();

            $table->enum('status', ['pending', 'paid', 'cancelled'])
                  ->default('pending');

            $table->timestamp('paid_at')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
