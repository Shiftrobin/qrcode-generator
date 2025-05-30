<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShippingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('shippings')) {
            Schema::create('shippings', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->integer('user_id')->comment('user_id=customer_id');
                $table->string('name');
                $table->string('email')->nullable();
                $table->string('mobile_no');
                $table->string('address');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shippings');
    }
}
