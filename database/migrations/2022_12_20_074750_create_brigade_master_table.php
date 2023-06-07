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
        Schema::create('brigade_master', function (Blueprint $table) {
            $table->unsignedBigInteger('brigade_id')->index()->comment('бригада')->constrained();
            $table->unsignedBigInteger('master_id')->index()->comment('мастер')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('brigade_master');
    }
};
