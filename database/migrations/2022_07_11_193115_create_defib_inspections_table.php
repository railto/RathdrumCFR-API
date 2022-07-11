<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('defib_inspections', function (Blueprint $table) {
            $table->id();
            $table->string('uuid')->unique();
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('member_id')->constrained('members');
            $table->foreignId('defib_id')->constrained('defibs')->cascadeOnDelete();
            $table->timestamp('inspected_at');
            $table->timestamp('pads_expire_at');
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('defib_inspections');
    }
};
