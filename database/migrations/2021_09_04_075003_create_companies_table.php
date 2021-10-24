<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration{

    public function up(){
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('logo');
            $table->mediumText('desc');
            $table->decimal('ticket_price',9,3);
            $table->timestamps();
        });
    }


    public function down(){
        Schema::dropIfExists('companies');
    }
}
