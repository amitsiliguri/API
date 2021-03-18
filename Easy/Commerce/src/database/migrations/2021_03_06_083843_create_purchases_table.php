<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchases', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('increment_id');
            $table->double('sub_total', 8, 4);
            $table->double('tax', 8, 4);
            $table->double('shipping_cost', 8, 4);
            $table->foreignId('supplier_id');
            $table->foreignId('supplier_contact_people_id');
            $table->foreignId('supplier_shipping_addresses_id');
            $table->timestamps();
        });

        Schema::table('purchases', function (Blueprint $table) {
            $table->foreign('supplier_id')->references('id')->on('suppliers')->constrained()->onDelete('cascade');
            $table->foreign('supplier_contact_people_id')->references('id')->on('supplier_contact_people')->constrained()->onDelete('cascade');
            $table->foreign('supplier_shipping_addresses_id')->references('id')->on('supplier_addresses')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('purchases');
    }
}
