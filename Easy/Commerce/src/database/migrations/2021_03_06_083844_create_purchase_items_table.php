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
            $table->string('sku', 100);
            $table->string('title', 100);
            $table->double('purchase_cost_per_unit', 8, 4);
            $table->foreignId('product_id')->nullable();
            $table->foreignId('purchase_id');
            $table->timestamps();
        });

        Schema::table('purchase_items', function (Blueprint $table) {
            $table->foreign('product_id')->references('id')->on('products');
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
