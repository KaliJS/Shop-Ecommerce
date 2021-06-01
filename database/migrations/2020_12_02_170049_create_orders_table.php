<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
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
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->float('actual_price',8,2);
            $table->float('final_price',8,2);
            $table->float('delivery_charge',8,2);
            $table->enum('payment_method', ['cash', 'paypal']);
            $table->float('latitude',8,2)->nullable();
            $table->float('longitude',8,2)->nullable();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->date('delivery_date');
            $table->time('delivery_time');
            $table->integer('pincode');
            $table->enum('order_status', ['booked', 'shipped','completed','cancelled','returned']);
            $table->enum('payment_status', ['failed','pending','success','cash on delivery']);
            $table->bigInteger('delivery_boy_id')->unsigned();
            $table->foreign('delivery_boy_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('orders');
    }
}
