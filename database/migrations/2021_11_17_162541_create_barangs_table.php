<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barangs', function (Blueprint $table) {
            $table->id();
            $table->string('kode_barang',50);
            $table->string('nama_barang',250);
            $table->foreignId('id_kategori')->constrained('kategoris');
            $table->integer('stock');
            $table->string('unit_satuan',100);
            $table->integer('harga_beli');
            $table->integer('harga_jual');
            $table->integer('for_store_id');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('barangs');
    }
}
