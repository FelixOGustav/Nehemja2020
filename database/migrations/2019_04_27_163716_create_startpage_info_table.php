<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStartpageInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('startpage_infos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type', 100);
            $table->string('titel', 200);
            $table->text('body');
            $table->string('img', 500);
            $table->timestamps();
        });

        Schema::create('contacts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('group', 100);
            $table->string('name', 100);
            $table->string('contact_info', 100);
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
        Schema::dropIfExists('startpage_info');
    }
}
