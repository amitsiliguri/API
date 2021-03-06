<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSupplierAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supplier_addresses', function (Blueprint $table) {
            $table->id();
            $table->string('building_name', 100);
            $table->string('floor', 100);
            $table->string('street', 100);
            $table->string('landmark', 100);
            $table->string('city', 100);
            $table->string('state', 100);
            $table->string('country', 100);
            $table->string('zip', 100);
            $table->string('phone', 100);
            $table->foreignId('supplier_id');
            $table->timestamps();
        });

        Schema::table('supplier_addresses', function (Blueprint $table) {
            $table->foreign('supplier_id')->references('id')->on('suppliers')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('supplier_addresses');
    }
}
