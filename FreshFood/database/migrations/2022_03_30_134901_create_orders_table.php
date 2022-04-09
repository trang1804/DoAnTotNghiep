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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('status');
            $table->dateTime('create_date')->date_format('YYYY-MM-DD');
            $table->string('payment')->default(0);
            $table->string('adress_receipt');
            $table->double('total');
            $table->timestamps();
            $table->foreignId('customer_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            // $table->foreignId('product_id')->constrained('products')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
