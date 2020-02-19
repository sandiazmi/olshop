<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'Admin Olshop',
            'email' => 'admin@olshop.test',
            'password' => bcrypt('123456'),
            'address' => 'Bekasi',
            'phone' => '087884300930'
        ]);

        $admin->assignRole('admin');
    }
}
