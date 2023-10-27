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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('member_id');
            $table->unsignedBigInteger('class_id');
            $table->decimal('amount', 8, 2);
            $table->string('method');
            $table->dateTime('transaction_date');
            $table->timestamps();
            
            $table->foreign('member_id')->references('id')->on('members');
            $table->foreign('class_id')->references('id')->on('name_classes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
