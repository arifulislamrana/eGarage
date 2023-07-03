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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('user_id')->constrained('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('service_id')->constrained('services')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('employee_id')->constrained('employees')->onDelete('cascade')->onUpdate('cascade');
            $table->string('status')->default('approved');
            $table->dateTime('service_time');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tasks', function(Blueprint $table){
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
            $table->dropForeign(['service_id']);
            $table->dropColumn('service_id');
            $table->dropForeign(['employee_id']);
            $table->dropColumn('employee_id');
        });
        Schema::dropIfExists('tasks');
    }
};
