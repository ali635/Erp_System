<?php

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'name' => 'mohamed_Ali', 
            'email' => 'test@test.com',
            'role_id' => 1,
            'password' => Hash::make('123456789'),
        ]);
    }
}
