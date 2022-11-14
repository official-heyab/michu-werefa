<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReceptionistsTable extends Migration{

    public function up(){
        Schema::create('receptionists', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('user_role_id');
            $table->unsignedBigInteger('company_branch_id');
            $table->timestamps();

            $table->foreign('user_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');

            $table->foreign('user_role_id')
            ->references('id')
            ->on('user_roles')
            ->onDelete('cascade');

            $table->foreign('company_branch_id')
            ->references('id')
            ->on('company_branches')
            ->onDelete('cascade');
        });
    }


    public function down(){
        Schema::dropIfExists('receptionists');
    }
}
