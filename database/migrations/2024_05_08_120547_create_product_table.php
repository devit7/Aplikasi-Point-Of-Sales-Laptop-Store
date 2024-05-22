<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('product_name');
            $table->integer('stock');
            $table->bigInteger('harga_jual');
            $table->bigInteger('harga_asli');
            $table->string('img');
            $table->uuid('supplier_id');
            $table->uuid('merk_id');
            $table->timestamps();

            // Foreign Key
            $table->foreign('supplier_id')->references('id')->on('supplier')->onDelete('cascade');
            $table->foreign('merk_id')->references('id')->on('merk')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product');
    }
};
