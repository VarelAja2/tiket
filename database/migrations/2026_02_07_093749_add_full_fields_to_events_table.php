<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('events', function (Blueprint $table) {

            if (!Schema::hasColumn('events', 'category_id')) {
                $table->foreignId('category_id')->nullable();
            }

            if (!Schema::hasColumn('events', 'short_description')) {
                $table->string('short_description')->nullable();
            }

            if (!Schema::hasColumn('events', 'description')) {
                $table->text('description')->nullable();
            }

            if (!Schema::hasColumn('events', 'location')) {
                $table->string('location')->nullable();
            }

            if (!Schema::hasColumn('events', 'city')) {
                $table->string('city')->nullable();
            }

            if (!Schema::hasColumn('events', 'age_rating')) {
                $table->string('age_rating')->nullable();
            }

            if (!Schema::hasColumn('events', 'discount_price')) {
                $table->decimal('discount_price', 12, 2)->nullable();
            }

            if (!Schema::hasColumn('events', 'available_seats')) {
                $table->integer('available_seats')->default(0);
            }

            if (!Schema::hasColumn('events', 'capacity')) {
                $table->integer('capacity')->default(0);
            }

            if (!Schema::hasColumn('events', 'is_featured')) {
                $table->boolean('is_featured')->default(false);
            }

            if (!Schema::hasColumn('events', 'is_free')) {
                $table->boolean('is_free')->default(false);
            }

            if (!Schema::hasColumn('events', 'status')) {
                $table->string('status')->default('draft');
            }

            if (!Schema::hasColumn('events', 'start_date')) {
                $table->dateTime('start_date')->nullable();
            }

            if (!Schema::hasColumn('events', 'end_date')) {
                $table->dateTime('end_date')->nullable();
            }

            if (!Schema::hasColumn('events', 'image_url')) {
                $table->string('image_url')->nullable();
            }
        });
    }

    public function down()
    {
        // kosongkan saja — biar aman
    }
};
