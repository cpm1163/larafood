<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailPlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('details_plans', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('plan_id'); //Chave estrangeira
            $table->timestamps();
            // Definindo a chave estrangeira e relacionamento
            $table->foreign('plan_id')
                    ->references('id')
                    ->on('plans')
                    ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('details_plans');
    }
}
