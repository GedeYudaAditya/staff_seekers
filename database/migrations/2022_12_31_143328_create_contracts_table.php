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
            $table->enum('status', ['process', 'berjalan', 'selesai', 'batal']);
            $table->string('position');
            $table->foreignId('staff_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('villa_id')->constrained('users')->onDelete('cascade');
            $table->string('start_date');
            $table->string('end_date');
            $table->string('signatures_staff')->nullable();
            $table->string('signatures_villa')->nullable();
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
