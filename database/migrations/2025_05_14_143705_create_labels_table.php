<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('labels', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->text('description')->nullable();
            $table->foreignId('created_by_id')
                ->constrained('users')
                ->cascadeOnDelete();
            $table->timestamps();
        });

        Schema::create('label_task', function (Blueprint $table) {
            $table->foreignId('task_id');
            $table->foreignId('label_id');
            $table->unique(['task_id', 'label_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('labels');
        Schema::dropIfExists('label_task');
    }
};
