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
        Schema::create('registrations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('member_id');
            $table->unsignedBIgInteger('class_id');
            $table->unsignedBIgInteger('transaction_id');
            $table->dateTime('registration_date');
            $table->timestamps();
            
            $table->foreign('class_id')->references('id')->on('name_classes');
            $table->foreign('member_id')->references('id')->on('members');
            $table->foreign('transaction_id')->references('id')->on('transactions');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registrations');
    }
};
