<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class RoleUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Obtiene un usuario y le asigna un rol
        $user = DB::table('users')->where('email', 'admin@developing.com')->first();
        $role = DB::table('roles')->where('name', 'admin')->first();
        DB::table('role_user')->insert([
            'role_id' => $role->id,
            'user_id' => $user->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        // Obtiene otro usuario y le asigna otro rol
        $user = DB::table('users')->where('email', 'user@developing.com')->first();
        $role = DB::table('roles')->where('name', 'user')->first();
        DB::table('role_user')->insert([
            'role_id' => $role->id,
            'user_id' => $user->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);

    }
}
