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
     Schema::table('orders', function (Blueprint $table) {
    $table->string('buyer_name')->after('user_id');
    $table->string('buyer_phone')->after('buyer_name');
    $table->string('buyer_email')->after('buyer_phone');

    $table->foreignId('event_id')->after('buyer_email')->constrained()->cascadeOnDelete();

    $table->integer('qty')->change();
    $table->decimal('price', 12, 2)->after('qty');
    $table->enum('payment_method', ['dana', 'gopay', 'ovo'])->after('price');

    $table->enum('status', ['pending', 'paid', 'cancelled'])->default('pending')->change();
});

    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
