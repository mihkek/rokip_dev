<?php

namespace Database\Seeders;

use App\Models\Status;
use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CreateTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Type::insert([
            [
                'is_active' => true,
                'user_id'   => 1,
                'model'     => 'device',
                'title'     => 'Отгружено',
            ],
            [
                'is_active' => true,
                'user_id'   => 1,
                'model'     => 'device',
                'title'     => 'Установлено',
            ],
            [
                'is_active' => true,
                'user_id'   => 1,
                'model'     => 'device',
                'title'     => 'Брак',
            ],
        ]);
    }
}
