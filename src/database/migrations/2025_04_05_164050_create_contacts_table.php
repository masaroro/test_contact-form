<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{

    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('first_name',20);
            $table->string('last_name',20);
            $table->string('gender');
            $table->string('email')->unique();
            $table->string('tel', 11);
            $table->string('address',50);
            $table->string('building',50)->nullable();
            $table->foreignId('category_id')->constrained('categories');
            $table->string('detail',100);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('contacts');
    }
}
