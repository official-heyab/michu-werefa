<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdvertisementsTable extends Migration{

    public function up(){
        Schema::create('advertisements', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->mediumText('desc');
            $table->string('link');
            $table->boolean('isCurrent');
            $table->timestamps();
        });;
    }


    public function down(){
        Schema::dropIfExists('advertisements');
    }
}
