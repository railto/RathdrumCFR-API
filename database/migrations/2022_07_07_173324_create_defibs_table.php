<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('defibs', function (Blueprint $table) {
            $table->id();
            $table->string('uuid')->unique();
            $table->string('name')->nullable();
            $table->string('location');
            $table->string('coordinates')->nullable();
            $table->boolean('display_on_map')->default(false);
            $table->string('model');
            $table->string('serial')->nullable();
            $table->string('owner')->default('RathdrumCFR');
            $table->string('last_inspected_by')->nullable();
            $table->timestamp('last_inspected_at')->nullable();
            $table->timestamp('last_serviced_at')->nullable();
            $table->timestamp('pads_expire_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('defibs');
    }
};
