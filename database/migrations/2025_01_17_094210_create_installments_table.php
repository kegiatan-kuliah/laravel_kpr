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
        if (!Schema::hasTable('installments')) {
            Schema::create('installments', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('loan_application_id');
                $table->unsignedBigInteger('installment_number');
                $table->date('due_date');
                $table->date('payment_date');
                $table->decimal('amount', 15, 2);
                $table->enum('status', ['pending','paid','late']);
                $table->timestamps();

                $table->foreign('loan_application_id')->references('id')->on('loan_applications')->onDelete('cascade');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('installments');
    }
};
