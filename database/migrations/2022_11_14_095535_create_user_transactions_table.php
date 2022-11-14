<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserTransactionsTable extends Migration{

    public function up(){
        Schema::create('user_transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('amount', 100);
            $table->unsignedSmallInteger('depositer_or_queue_id');
            $table->boolean('isWithdrawal');
            $table->timestamps();

            $table->foreign('user_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');
        });
    }


    public function down(){
        Schema::dropIfExists('user_transactions');
    }
}
