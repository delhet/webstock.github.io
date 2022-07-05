<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransferBarangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transfer_barangs', function (Blueprint $table) {
            $table->id();
            $table->string('no_document',50);
            $table->date('tanggal_document');
            $table->foreignId('dari_store_id')->constrained('stores');
            $table->foreignId('tujuan_store_id')->constrained('stores');
            $table->string('catatan',250);
            $table->foreignId('id_karyawan')->constrained('karyawans');
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
        Schema::dropIfExists('transfer_barangs');
    }
}
