<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAllTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function(Blueprint $table){
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('cpf')->unique();
            $table->string('password');
        });

        Schema::create('units', function(Blueprint $table){
            $table->id();
            $table->string('name');
            $table->integer('id_owner');

        });
        Schema::create('unit_peoples', function(Blueprint $table){
            $table->id();
            $table->integer('id_unit');
            $table->string('name');
            $table->date('birth_date');

        });
        Schema::create('unit_vehicles', function(Blueprint $table){
            $table->id();
            $table->integer('id_unit');
            $table->string('title');
            $table->string('color');
            $table->string('plate');


        });
        Schema::create('unit_pets', function(Blueprint $table){
            $table->id();
            $table->integer('id_unit');
            $table->string('name');
            $table->string('race');

        });
        Schema::create('walls', function(Blueprint $table){
            $table->id();
            $table->string('title');
            $table->string('body');
            $table->dateTime('date_created');

        });
        Schema::create('walls_likes', function(Blueprint $table){
            $table->id();
            $table->integer('id_wall');
            $table->integer('id_user');

        });
        Schema::create('docs', function(Blueprint $table){
            $table->id();
            $table->string('title');
            $table->string('file_url');

        });
        Schema::create('billets', function(Blueprint $table){
            $table->id();
            $table->integer('id_unit');
            $table->string('title');
            $table->string('file_url');

        });
        Schema::create('warnings', function(Blueprint $table){
            $table->id();
            $table->integer('id_unit');
            $table->string('title');
            $table->string('status')->default('IN_REVIEW'); //IN_REVIEW, RESOLVER
            $table->date('date_created');
            $table->text('photos');

        });

        Schema::create('found_and_lost', function(Blueprint $table){
            $table->id();
            $table->string('status')->default('LOST'); //LOST, RECOVERED
            $table->string('photo');
            $table->string('description');
            $table->string('where');
            $table->date('date_create');

        });

        Schema::create('areas', function(Blueprint $table){
            $table->id();
            $table->integer('allowed')->default(1);
            $table->string('title');
            $table->string('cover');
            $table->string('days');
            $table->time('start_time');
            $table->time('end_time');

        });

        Schema::create('area_disabled_days', function(Blueprint $table){
            $table->id();
            $table->integer('id_area');
            $table->date('day');

        });  Schema::create('reservations', function(Blueprint $table){
            $table->id();
            $table->integer('id_unit');
            $table->integer('id_aarea');
            $table->dateTime('reservation_date');

        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::dropIfExists('users');
        Schema::dropIfExists('units');
        Schema::dropIfExists('unit_peoples');
        Schema::dropIfExists('unit_vehicles');
        Schema::dropIfExists('unit_pets');
        Schema::dropIfExists('walls');
        Schema::dropIfExists('walls_likes');
        Schema::dropIfExists('docs');
        Schema::dropIfExists('billets');
        Schema::dropIfExists('warnings');
        Schema::dropIfExists('found_and_lost');
        Schema::dropIfExists('areas');
        Schema::dropIfExists('area_disabled_days');
        Schema::dropIfExists('reservations');
    }

}
