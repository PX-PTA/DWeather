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
            $table->string('xt');
            $table->string('ft');
            $table->string('selisih');
            $table->string('mae');
            $table->string('mse');
            $table->string('mape');
            $table->timestamps();
            $table->softDeletes($column = 'deleted_at', $precision = 0);
            $table->foreignId('konstanta_id')->constrained('konstantas');
            $table->foreignId('sensor_id')->constrained('sensors');
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
