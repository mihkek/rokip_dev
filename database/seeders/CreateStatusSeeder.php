<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CreateStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Status::insert([
            [
                'is_active' => true,
                'user_id'   => 1,
                'model'     => 'user',
                'color'     => 'success',
                'title'     => 'Активен',
                'titles'    => 'Активные'
            ],
            [
                'is_active' => true,
                'user_id'   => 1,
                'model'     => 'user',
                'color'     => 'danger',
                'title'     => 'Не активен',
                'titles'    => 'Не активные'
            ],
            [
                'is_active' => true,
                'user_id'   => 1,
                'model'     => 'device',
                'color'     => 'success',
                'title'     => 'Активен',
                'titles'    => 'Активные'
            ],
            [
                'is_active' => true,
                'user_id'   => 1,
                'model'     => 'device',
                'color'     => 'danger',
                'title'     => 'Не активен',
                'titles'    => 'Не активные'
            ],
            [
                'is_active' => true,
                'user_id'   => 1,
                'model'     => 'company',
                'color'     => 'success',
                'title'     => 'Активна',
                'titles'    => 'Активные'
            ],
            [
                'is_active' => true,
                'user_id'   => 1,
                'model'     => 'company',
                'color'     => 'danger',
                'title'     => 'Не активна',
                'titles'    => 'Не активные'
            ],
            [
                'is_active' => true,
                'user_id'   => 1,
                'model'     => 'equipment',
                'color'     => 'primary',
                'title'     => 'Отгружено',
                'titles'    => 'Отгруженные'
            ],
            [
                'is_active' => true,
                'user_id'   => 1,
                'model'     => 'equipment',
                'color'     => 'success',
                'title'     => 'Установлено',
                'titles'    => 'Установленные'
            ],
            [
                'is_active' => true,
                'user_id'   => 1,
                'model'     => 'equipment',
                'color'     => 'danger',
                'title'     => 'Брак',
                'titles'    => 'Брак'
            ],
            [
                'is_active' => true,
                'user_id'   => 1,
                'model'     => 'consumer',
                'color'     => 'success',
                'title'     => 'Активен',
                'titles'    => 'Активные'
            ],
            [
                'is_active' => true,
                'user_id'   => 1,
                'model'     => 'consumer',
                'color'     => 'danger',
                'title'     => 'Не активен',
                'titles'    => 'Не активные'
            ],
            [
                'is_active' => true,
                'user_id'   => 1,
                'model'     => 'brigade',
                'color'     => 'success',
                'title'     => 'Активна',
                'titles'    => 'Активные'
            ],
            [
                'is_active' => true,
                'user_id'   => 1,
                'model'     => 'brigade',
                'color'     => 'danger',
                'title'     => 'Не активна',
                'titles'    => 'Не активные'
            ],
        ]);
    }
}
