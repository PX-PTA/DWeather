<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataPembandingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_pembandings', function (Blueprint $table) {
            $table->id();
            $table->timestamp('waktu');
            $table->string('curah_hujan')->nullable();
            $table->string('suhu_udara')->nullable();
            $table->string('kelembapan_udara')->nullable();
            $table->string('tekanan_udara')->nullable();
            $table->string('kecepatan_angin')->nullable();
            $table->timestamps();
            $table->softDeletes($column = 'deleted_at', $precision = 0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data_pembandings');
    }
}
