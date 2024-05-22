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
        Schema::create('detail_transaksi', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->integer('quantity')->unsigned();
            $table->bigInteger('total')->unsigned();
            $table->bigInteger('harga_jual')->unsigned();
            $table->bigInteger('harga_asli')->unsigned();
            $table->uuid('transaksi_id');
            $table->uuid('product_id');
            $table->timestamps();

            // Foreign Key
            $table->foreign('transaksi_id')->references('id')->on('transaksi')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('product')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_transaksi');
    }
};
