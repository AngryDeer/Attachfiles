<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class AngrydeerAttachfilesCreateTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('attached', function (Blueprint $table) {
            $table->increments('id');
            $table->string('attachable_type');
            $table->integer('attachable_id')->unsigned();
            $table->integer('attach_id')->unsigned();

            $table->engine = 'InnoDB';

            $table->index([ 'attachable_type', 'attachable_id' ]);
        });

        Schema::create('attaches', function (Blueprint $table) {
            $table->increments('id');
            $table->string('namespace');
            $table->string('filename');
            $table->string('title')->nullable();
            $table->string('alt')->nullable();
            $table->string('desc')->nullable();

            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $tables = [ 'attached', 'attaches' ];
        foreach ($tables as $table) {
            Schema::dropIfExists($table);
        }
    }
}
