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
        Schema::create('task_service', function (Blueprint $table) {
            $table->id();
            $table->foreignId('task_id')->constrained('tasks')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('service_id')->constrained('services')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('task_service', function(Blueprint $table){
            $table->dropForeign(['task_id']);
            $table->dropColumn('task_id');
            $table->dropForeign(['service_id']);
            $table->dropColumn('service_id');
        });
        Schema::dropIfExists('task_service');
    }
};
