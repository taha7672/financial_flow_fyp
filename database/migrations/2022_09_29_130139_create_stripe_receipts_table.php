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
        Schema::create('stripe_receipts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->string('customer_id')->nullable();
            $table->string('stripe_charge_id');
            $table->string('stripe_receipt_url');
            $table->integer('stripe_receipt_amount');
            $table->string('stripe_receipt_status');
            $table->integer('stripe_receipt_created');
            $table->string('stripe_receipt_currency');

            $table->softDeletes();
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
        Schema::dropIfExists('stripe_receipts');
    }
};
