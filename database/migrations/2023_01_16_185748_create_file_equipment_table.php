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
        Schema::create('file_equipment', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('status_id')->index()->nullable()->comment('статус')->constrained();
            $table->unsignedBigInteger('user_id')->index()->comment('добавитель')->constrained();
            $table->unsignedBigInteger('company_id')->index()->comment('компания')->constrained('users');
            $table->string('title')->index();
            $table->string('file')->index()->nullable();
            $table->unsignedInteger('count')->nullable()->comment('общее кол-во');
            $table->unsignedInteger('count_double')->nullable()->comment('кол-во дублей');
            $table->longText('successes')->nullable()->comment('успехи');
            $table->longText('errors')->nullable()->comment('ошибки');
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
        Schema::dropIfExists('file_equipment');
    }
};
