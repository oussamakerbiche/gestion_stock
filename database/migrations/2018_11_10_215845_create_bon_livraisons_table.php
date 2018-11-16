<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBonLivraisonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bon_livraisons', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('date_bon');
            $table->decimal('prix_total_Bon',9,2);
            $table->decimal('remise_bon',9,2);
            $table->decimal('total_apres_remise',9,2);
            $table->decimal('versment',9,2);
            $table->decimal('reste_payer',9,2);
            $table->decimal('ancient_credit',9,2);
            $table->decimal('reste_payer_total',9,2);
            $table->timestamps();
        });
         Schema::create('ligne_bonlivraison', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('stock_id');
            $table->unsignedInteger('bonlivraison_id');
            $table->float('qte_ligne_bl',9,2);
            $table->decimal('remise_ligne_bl',9,2);
            $table->decimal('montant_ligne_bl',9,2);
            $table->decimal('montant_remiseligne_bl',9,2);
            $table->decimal('prix_vente_bl',9,2);
            $table->timestamps();
            $table->foreign('stock_id')->references('id')->on('stocks')->onDelete('cascade');
            $table->foreign('bonlivraison_id')->references('id')->on('bon_livraisons')->onDelete('cascade');
        });




    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bon_livraisons');
        Schema::dropIfExists('ligne_bonlivraison');
    }
}
