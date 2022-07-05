<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKaryawansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('karyawans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap',250);
            $table->date('tanggal_lahir');
            $table->string('jenis_kelamin',20);
            $table->string('alamat',250);
            $table->string('telp',20);
            $table->string('posisi',20);
            $table->string('email', 100);
            $table->string('password', 100);
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
        Schema::dropIfExists('karyawans');
    }
}
