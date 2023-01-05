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
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->foreignId('villa_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('contract_id')->constrained('contracts')->onDelete('cascade');
            $table->string('code_transaction');
            $table->string('price');
            $table->string('total_price');
            $table->string('bukti_pembayaran');
            $table->enum('payment_status', ['pending', 'valid', 'invalid']);
            $table->enum('status', ['process', 'send', 'received', 'done']);
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
        Schema::dropIfExists('transactions');
    }
};
