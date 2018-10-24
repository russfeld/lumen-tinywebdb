<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Keys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('keys', function (Blueprint $table) {
          $table->increments('id');
          $table->string('key')->unique();
          $table->timestamps();
      });

      Schema::table('data', function(Blueprint $table){
          $table->string('tag')->unique();
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('keys');

        Schema::table('data', function(Blueprint $table){
          $table->dropColumn('tag');
        });
    }
}
