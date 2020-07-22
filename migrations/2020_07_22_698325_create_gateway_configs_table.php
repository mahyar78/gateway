<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGatewayConfigsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gateway_configs', function (Blueprint $table) {
            $table->engine="innoDB";
            $table->increments('id');
            $table->string('name');
            $table->string('value');
            $table->unsignedBigInteger('user_id');
            $table->index(['name', 'user_id']);

            $table
                ->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('gateway_configs');
    }
}
