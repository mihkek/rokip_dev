<?php


namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

/**
 * Сид создания ролей
 *
 * Class CreateRoleSeeder
 * @package Database\Seeders
 *
 * @author Бондарь Дмитрий <telegram: @demy2>
 */
class CreateRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::insert([
            [
                'name'       => 'super_admin',
                'guard_name' => 'web',
            ],
            [
                'name'       => 'admin',
                'guard_name' => 'web',
            ],
            [
                'name'       => 'user',
                'guard_name' => 'web',
            ],
            [
                'name'       => 'company',
                'guard_name' => 'web',
            ],
            [
                'name'       => 'manufacturer',
                'guard_name' => 'web',
            ],
            [
                'name'       => 'contractor',
                'guard_name' => 'web',
            ],
            [
                'name'       => 'master',
                'guard_name' => 'web',
            ],
        ]);
    }
}
