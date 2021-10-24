<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBalanceSheetTable extends Migration{

    public function up(){
        Schema::create('balance_sheet', function (Blueprint $table) {
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
        Schema::dropIfExists('balance_sheet');
    }
}
