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
        if (!Schema::hasTable('loan_applications')) {
            Schema::create('loan_applications', function (Blueprint $table) {
                $table->id();
                $table->date('application_date');
                $table->unsignedBigInteger('customer_id');
                $table->unsignedBigInteger('property_id');
                $table->unsignedBigInteger('bank_id');
                $table->decimal('loan_amount', 15, 2);
                $table->decimal('interest_rate', 5, 2);
                $table->unsignedBigInteger('loan_term_years');
                $table->enum('status', ['pending','approved','rejected'])->default('pending');
                $table->timestamps();

                $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
                $table->foreign('property_id')->references('id')->on('properties')->onDelete('cascade');
                $table->foreign('bank_id')->references('id')->on('banks')->onDelete('cascade');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loan_applications');
    }
};
