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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id');
            $table->foreignId('customer_id');
            $table->date('invoice_date');
            $table->date('due_date')->nullable();
            $table->string('invoice_number');
            $table->decimal('sub_total', 8, 2);
            $table->decimal('tax_amount', 8, 2);
            $table->decimal('invoice_discount', 8, 2);
            $table->decimal('inv_total_amount', 8, 2);
            $table->string('paid_status')->nullable();
            $table->string('status')->default(1);
            $table->string('inv_uinque_key');
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
        Schema::dropIfExists('invoices');
    }
};
