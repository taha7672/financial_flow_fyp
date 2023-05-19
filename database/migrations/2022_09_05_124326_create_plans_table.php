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
        Schema::create('plans', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('duration_days');
            $table->string('number_of_invoices');
            $table->boolean('send_postal')->default(false);
            $table->boolean('sms')->default(false);
            $table->boolean('email')->default(false);
            $table->boolean('charge_per_transaction')->default(false);
            $table->boolean('charge_per_alert')->default(false);
            $table->boolean('status')->default(true);
            $table->string('max_allowed_coustomers');
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
        Schema::dropIfExists('plans');
    }
};
