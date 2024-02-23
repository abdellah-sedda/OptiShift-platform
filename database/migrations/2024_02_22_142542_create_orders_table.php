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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->enum('state', ['accepted', 'charged', 'on_way', 'delivered', 'returned'])->default('accepted');
            $table->foreignId('client_id')->constrained();
            $table->foreignId('depot_id')->constrained();
            $table->foreignId('truck_id')->nullable()->constrained();
            $table->foreignId('deliveryman_id')->nullable()->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
