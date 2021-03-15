<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchaseItemStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_item_stocks', function (Blueprint $table) {
            $table->id();
            $table->integer('quantity');
            $table->date('expiry_date')->nullable();
            $table->foreignId('product_id');
            $table->foreignId('warehouse_id');
            $table->foreignId('purchase_item_id');
            $table->timestamps();
        });
        
        Schema::table('purchase_item_stocks', function (Blueprint $table) {
            $table->foreign('product_id')->references('id')->on('products')->constrained()->onDelete('cascade');
            $table->foreign('warehouse_id')->references('id')->on('warehouses')->constrained()->onDelete('cascade');
            $table->foreign('purchase_item_id')->references('id')->on('purchase_items')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('purchase_item_stocks');
    }
}
