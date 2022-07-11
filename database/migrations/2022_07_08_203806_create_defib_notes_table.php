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
        Schema::create('defib_notes', function (Blueprint $table) {
            $table->snowflake()->primary();
            $table->foreignSnowflake('defib_id')->constrained()->cascadeOnDelete();
            $table->foreignSnowflake('user_id')->constrained();
            $table->text('note');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('defib_notes');
    }
};