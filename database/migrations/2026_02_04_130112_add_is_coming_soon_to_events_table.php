<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('events', function (Blueprint $table) {
            if (!Schema::hasColumn('events', 'is_coming_soon')) {
                $table->boolean('is_coming_soon')->default(0);
            }
        });
    }

    public function down()
    {
        Schema::table('events', function (Blueprint $table) {
            if (Schema::hasColumn('events', 'is_coming_soon')) {
                $table->dropColumn('is_coming_soon');
            }
        });
    }
};
