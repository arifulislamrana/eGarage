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
            $table->string('phone');
            $table->string('delivery_address');
            $table->foreignId('employee_id')->nullable()->constrained('employees')->onDelete('cascade')->onUpdate('cascade');
            $table->dateTime('order_date')->default(now());
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn('phone');
            $table->dropColumn('delivery_address');
            $table->dropForeign(['employee_id']);
            $table->dropColumn('employee_id');
            $table->dropColumn('order_date');
        });
    }
};
