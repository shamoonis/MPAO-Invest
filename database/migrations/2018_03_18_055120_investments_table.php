<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InvestmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('investments', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date');
            $table->integer('funds_id')->unsigned();
            $table->integer('institutions_id')->unsigned();
            $table->integer('types_id')->unsigned();
            $table->string('reference');
            $table->float('purchasePrice',9,3);
            $table->decimal('rate', 8, 2);
            $table->integer('maturityDays');
            
            
            $table->foreign('types_id')->references('id')->on('types');
            $table->foreign('institutions_id')->references('id')->on('institutions');
            $table->foreign('funds_id')->references('id')->on('funds');
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
        //
        Schema::dropIfExists('investments');
    }
}
