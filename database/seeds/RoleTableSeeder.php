<?php

use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = ['user', 'admin'];
        foreach ($roles as $role) {
            if (!DB::table('roles')->where('name', $role)->first()) {
                DB::table('roles')->insert(['name' => $role]);
            }
        }
    }
}
