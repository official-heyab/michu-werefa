<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyBranchesTable extends Migration{

    public function up(){
        Schema::create('company_branches', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('company_id');
            $table->string('estimated_queue_time');
            $table->mediumText('working_hours');
            $table->mediumText('desc');
            $table->timestamps();

            $table->foreign('company_id')
            ->references('id')
            ->on('companies')
            ->onDelete('cascade');
        });
    }


    public function down(){
        Schema::dropIfExists('company_branches');
    }
}
