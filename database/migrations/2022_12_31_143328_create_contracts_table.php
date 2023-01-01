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
        Schema::create('contracts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->longText('description');
            $table->string('status');
            $table->foreignId('staff_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('villa_id')->constrained('users')->onDelete('cascade');
            $table->string('start_date');
            $table->string('end_date');
            $table->string('total_price');
            $table->string('signatures_staff');
            $table->string('signatures_villa');
            $table->enum('payment_status', ['pending', 'paid']);
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
        Schema::dropIfExists('contracts');
    }
};
