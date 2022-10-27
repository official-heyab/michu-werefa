<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserBalanceSheetsTable extends Migration{

    public function up(){
        Schema::create('user_balance_sheets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->boolean('isWithdrawal');
            $table->string('amount', 100);
            $table->unsignedSmallInteger('transaction_id');
            $table->timestamps();

            $table->foreign('user_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');
        });
    }

    public function down(){
        Schema::dropIfExists('user_balance_sheets');
    }
}
