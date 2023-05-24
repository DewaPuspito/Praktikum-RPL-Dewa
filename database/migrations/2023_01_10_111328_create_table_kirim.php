<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kirim', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('jadwal_id');
            $table->foreign('jadwal_id')->references('id')->on('jadwal')->onDelete('cascade');
            $table->unsignedBigInteger('kurir_id');
            $table->unsignedBigInteger('pemesan_id');
            $table->foreign('pemesan_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('kurir_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('jumlah');
            $table->text('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_kirim');
    }
};
