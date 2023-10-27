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
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('name', 64);
            $table->char('gender', 1);
            $table->char('phone_number', 15);
            $table->text('address');
            $table->string('email', 64);
            $table->unsignedBigInteger('class_id');
            $table->timestamps();

            $table->foreign('class_id')->references('id')->on('name_classes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};
