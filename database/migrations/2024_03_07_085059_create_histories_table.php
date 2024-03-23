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
        Schema::create('histories', function (Blueprint $table) {
            $table->id('id');
            $table->integer('Transaction_id');
            $table->string('Name'); 
            $table->string('Phno'); 
            $table->string('Credit_from');
            $table->double('Credit_Amount');
            $table->string('Debit_to');
            $table->double('Debit_Amount');
            $table->double('Existing_Amount');
            $table->double('Total_Balance'); 
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('histories');
    }
};
