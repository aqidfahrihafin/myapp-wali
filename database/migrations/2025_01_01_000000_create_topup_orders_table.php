<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('topup_orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_id')->unique();
            $table->unsignedBigInteger('wali_id')->nullable();
            $table->unsignedBigInteger('child_id')->nullable();
            $table->integer('amount')->default(0);
            $table->string('status')->default('pending');
            $table->longText('raw_response')->nullable();
            $table->timestamps();

            $table->index(['order_id', 'status']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('topup_orders');
    }
};
