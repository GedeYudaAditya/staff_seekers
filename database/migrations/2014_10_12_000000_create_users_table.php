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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('villa_name')->nullable();
            $table->string('username')->unique();
            $table->integer('age')->nullable();
            // $table->foreignId('requirement')->nullable()->constrained('requirements')->onDelete('cascade');
            $table->string('email')->unique();
            $table->enum('role', ['admin', 'staff', 'villa']);
            $table->enum('status', ['active', 'inactive']);
            $table->text('bio')->nullable();
            $table->longText('detailBio')->nullable();
            $table->string('salary')->nullable();
            $table->text('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('image')->nullable();
            $table->string('image_path')->nullable();
            $table->string('cv')->nullable();
            $table->string('cv_path')->nullable();
            $table->string('no_rek')->nullable();
            $table->string('villa_image')->nullable();
            $table->string('villa_image_path')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
