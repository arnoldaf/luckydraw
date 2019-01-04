<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Roles extends Migration
{
    private $tbl = 'roles';
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
         if (Schema::hasTable($this->tbl)) {
             return;
         }
         Schema::create($this->tbl , function (Blueprint $table) {
             $table->increments('id')->unsigned();
             $table->string('name');
             $table->timestamps();
         });
     }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
     public function down()
     {
         Schema::dropIfExists($this->tbl);
     }
}
