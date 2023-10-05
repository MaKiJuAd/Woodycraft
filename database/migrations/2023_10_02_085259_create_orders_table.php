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
        Schema::disableForeignKeyConstraints();
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('customer_id')->constrained()->onUpdate('restrict')->onDelete('restrict');
            $table->integer('registered');
            $table->foreignId('delivery_add_id')->constrained()->onUpdate('restrict')->onDelete('restrict');
            $table->string('payment_type');
            $table->date('date');
            $table->tinyInteger('status');
            $table->string('session');
            $table->float('total');
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
