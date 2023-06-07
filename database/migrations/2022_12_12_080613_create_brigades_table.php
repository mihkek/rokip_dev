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
        Schema::create('brigades', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('status_id')->index()->comment('статус')->constrained();
            $table->unsignedBigInteger('user_id')->index()->comment('добавитель')->constrained();
            $table->unsignedBigInteger('company_id')->index()->comment('компания')->constrained();
            $table->unsignedBigInteger('master_id')->index()->comment('бригадир')->constrained();
            $table->string('title');
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
        Schema::dropIfExists('brigades');
    }
};
