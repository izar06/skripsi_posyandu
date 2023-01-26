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
        Schema::create('checkup', function (Blueprint $table) {
            $table->id();
            $table->foreignId('balita_id')->constrained('balita');
            $table->string('berat_badan');
            $table->foreignId('vitamin_id')->constrained('vitamin');
            $table->foreignId('imunisasi_id')->constrained('imunisasi');
            $table->string('status_gizi');
            $table->string('checkup_ke');
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
        Schema::dropIfExists('checkup');
    }
};
