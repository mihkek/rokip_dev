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
        Schema::create('devices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('status_id')->index()->comment('статус')->constrained();
            $table->unsignedBigInteger('admin_id')->index()->comment('добавитель')->constrained('users');
            $table->unsignedBigInteger('consumer_id')->index()->comment('потребитель')->constrained();
            $table->unsignedBigInteger('master_id')->index()->comment('мастер')->constrained('users');
            $table->unsignedBigInteger('type_id')->index()->comment('тип')->constrained();
            $table->string('title')->index();
            $table->text('description')->nullable();
            $table->json('images')->nullable();
            $table->string('modification')->nullable()->comment('модификация');
            $table->string('address')->nullable()->comment('адрес установки');
            $table->string('meter_reading')->nullable()->comment('показания счетчика');
            $table->decimal('current')->index()->nullable()->comment('сила тока');
            $table->decimal('voltage')->index()->nullable()->comment('номинальное напряжение');
            $table->text('cause')->nullable();
            $table->timestamp('installation_at')->nullable();
            $table->year('year_issue')->nullable();
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
        Schema::dropIfExists('devices');
    }
};
