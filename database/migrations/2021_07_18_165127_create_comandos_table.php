<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComandosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comandos', function (Blueprint $table) {
            $table->id();
            $table->string('comando', 20)->nullable();
            $table->enum('executado', ['s','n'])->default('n');
            $table->timestamps();
        });

        DB::table('comandos')->insert([
            'comando' => null
        ]);


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comandos');
    }
}
