<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBranchReceptionistsTable extends Migration{

    public function up(){
        Schema::create('branch_receptionists', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('phone');
            $table->unsignedBigInteger('company_branch_id');
            $table->timestamps();

            $table->foreign('company_branch_id')
            ->references('id')
            ->on('company_branches')
            ->onDelete('cascade');
        });
    }

    public function down(){
        Schema::dropIfExists('branch_receptionists');
    }
}
