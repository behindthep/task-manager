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
        Schema::table('label_task', function (Blueprint $table) {
            $table->foreign('task_id')
                ->references('id')
                ->on('tasks')
                ->cascadeOnDelete();

            $table->foreign('label_id')
                ->references('id')
                ->on('labels')
                ->cascadeOnDelete();

            $table->primary(['task_id', 'label_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('label_task', function (Blueprint $table) {
            $table->dropPrimary(['task_id', 'label_id']);

            $table->dropForeign(['task_id']);
            $table->dropForeign(['label_id']);
        });
    }
};
