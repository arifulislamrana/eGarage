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
        Schema::table('products', function (Blueprint $table) {
            $table->string('buying_price');
            $table->string('dealer')->nullable();
            $table->string('quantity');
            $table->integer('sold')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('buying_price');
            $table->dropColumn('dealer');
            $table->dropColumn('quantity');
            $table->dropColumn('sold');
        });
    }
};
