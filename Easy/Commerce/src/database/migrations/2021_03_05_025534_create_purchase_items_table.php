<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchaseItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id');
            $table->foreignId('purchase_id');
            $table->double('purchase_cost_per_unit', 8, 4);
            $table->integer('quantity');
            $table->timestamps();
        });

        Schema::table('purchase_items', function (Blueprint $table) {
            $table->foreign('product_id')->references('id')->on('products')->constrained()->onDelete('cascade');
            $table->foreign('purchase_id')->references('id')->on('purchases')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('purchase_items');
    }
}
