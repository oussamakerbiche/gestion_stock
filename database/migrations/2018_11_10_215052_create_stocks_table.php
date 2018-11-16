<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stocks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('reference');
            $table->string('designation');
            $table->dateTime('date_entre');
            $table->float('qte_initiale',9,2);
            $table->float('qte_restante',9,2);
            $table->decimal('prix_achat',9,2);
            $table->decimal('prix_venteD',9,2);
            $table->decimal('prix_venteG',9,2);
            $table->integer('tva');
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
        Schema::dropIfExists('stocks');
    }
}
