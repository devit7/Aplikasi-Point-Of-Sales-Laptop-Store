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
            $table->string('product_name')->unique();
            $table->integer('stock')->unsigned();
            $table->bigInteger('harga_jual')->unsigned();
            $table->bigInteger('harga_asli')->unsigned();
            $table->string('img')->nullable();
            $table->uuid('supplier_id');
            $table->uuid('merk_id');
            $table->enum('status', ['aktif', 'tidak aktif'])->default('aktif');
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
