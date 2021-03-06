<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSupplierContactPeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supplier_contact_people', function (Blueprint $table) {
            $table->id();
            $table->boolean('active')->default(true);
            $table->tinyInteger('type')->default(0);
            $table->string('job_title', 100);
            $table->string('prefix', 100)->nullable();
            $table->string('first_name', 100);
            $table->string('middle_name', 100)->nullable();
            $table->string('last_name', 100);
            $table->string('email', 100)->unique();
            $table->string('phone', 100)->unique();
            $table->string('gender', 56);
            $table->foreignId('supplier_id');
            $table->timestamps();
        });
        Schema::table('supplier_contact_people', function (Blueprint $table) {
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
        Schema::dropIfExists('supplier_contact_people');
    }
}
