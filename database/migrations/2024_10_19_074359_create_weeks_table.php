<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWeeksTable extends Migration
{
    public function up()
    {
        Schema::create('weeks', function (Blueprint $table) {
            $table->id();
            $table->string('week_name');
            $table->date('from_date');
            $table->date('to_date');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('weeks');
    }
}
