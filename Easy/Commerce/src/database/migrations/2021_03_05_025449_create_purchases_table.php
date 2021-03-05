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
            $table->foreignId('vendor_id');
            $table->double('sub_total', 8, 4);
            $table->double('tax', 8, 4);
            $table->double('shipping_cost', 8, 4);
            $table->timestamps();
        });

        Schema::table('purchases', function (Blueprint $table) {
            $table->foreign('vendor_id')->references('id')->on('vendors')->constrained()->onDelete('cascade');
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
