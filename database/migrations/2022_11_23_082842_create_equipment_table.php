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
        Schema::create('equipment', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('status_id')->index()->comment('статус')->constrained();
            $table->unsignedBigInteger('user_id')->index()->comment('добавитель')->constrained();
            $table->unsignedBigInteger('file_equipment_id')->index()->comment('файл')->constrained();
            $table->unsignedBigInteger('master_id')->nullable()->index()->comment('мастер')->constrained('users');
            $table->unsignedBigInteger('company_id')->nullable()->index()->comment('компания')->constrained();
//            $table->unsignedBigInteger('type_id')->index()->comment('тип')->constrained();
            $table->string('title')->nullable()->index();
            $table->string('shipment_number')->nullable()->comment('номер отгрузки');
            $table->string('factory_number')->nullable()->comment('заводской номер');
            $table->string('modification')->nullable()->comment('модификация');
            $table->string('current')->index()->nullable()->comment('сила тока');
            $table->string('voltage')->index()->nullable()->comment('номинальное напряжение');
            $table->text('description')->nullable();
            $table->timestamp('shipping_at')->nullable()->comment('дата отгрузки');
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
        Schema::dropIfExists('equipment');
    }
};
