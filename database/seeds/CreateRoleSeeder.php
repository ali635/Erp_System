<?php

use App\Models\Role;
use Illuminate\Database\Seeder;

class CreateRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name' => 'Super Admin', 
            'permissions' => json_encode(['products','fees','roles'])
        ]);
    }
}
