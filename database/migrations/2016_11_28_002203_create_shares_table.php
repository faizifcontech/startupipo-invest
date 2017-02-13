<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSharesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shares', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->decimal('total_share', 7, 2);
            $table->decimal('monthly_profit', 7, 2);
            $table->integer('per_lot');
            $table->integer('model_of_investment');
            $table->string('send_to');
            $table->string('saved_url');
            $table->dateTime('transfer_on');
            $table->tinyInteger('status')->default(1);
            $table->text('notes')->nullable();
            $table->text('remark')->nullable();
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
        Schema::dropIfExists('shares');
    }
}
