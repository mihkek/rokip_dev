<?php

namespace Database\Seeders;

use App\Models\Status;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class CreateUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'status_id' => Status::USER_ACTIVE,
            'admin_id'  => 1,
            'name'      => 'admin',
            '_email'     => 'admin@mail.ru',
            'password'  => Hash::make('admin1234'),
        ]);
        $role = Role::where('name', 'super_admin')->first();
        $user->assignRole($role);
    }
}
