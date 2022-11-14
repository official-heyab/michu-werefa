<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserQueuesTable extends Migration{

    public function up(){
        Schema::create('user_queues', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('company_branch_id');
            $table->string('status',100);
            $table->timestamps();

            $table->foreign('user_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');

            $table->foreign('company_id')
            ->references('id')
            ->on('companies')
            ->onDelete('cascade');

            $table->foreign('company_branch_id')
            ->references('id')
            ->on('company_branches')
            ->onDelete('cascade');
        });
    }


    public function down(){
        Schema::dropIfExists('user_queues');
    }
}
