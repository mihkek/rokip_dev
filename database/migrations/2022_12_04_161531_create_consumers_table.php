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
        Schema::create('consumers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('status_id')->index()->comment('статус')->constrained();
            $table->unsignedBigInteger('user_id')->index()->comment('добавитель')->constrained();
            $table->string('title');
            $table->string('phone');
            $table->json('phones')->nullable()->comment('телефоны');
            $table->string('contract')->comment('договор');
            $table->json('fillings')->nullable()->comment('пломбы');
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
        Schema::dropIfExists('consumers');
    }
};
