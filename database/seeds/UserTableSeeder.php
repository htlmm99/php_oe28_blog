<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'email' => 'hungyen1101@gmail.com',
            'password' => bcrypt('manh123456'),
            'username' => 'Nguyen Dinh Manh',
            'phone' => '0378046304',
            'role_id' => 2,
            ],
            ['email' => 'hungyen1111@gmail.com',
            'password' => bcrypt('manh123456'),
            'username' => 'Nguyen Dinh Manh',
            'phone' => '0378046304',
            'role_id' => 1,
            ],
        );
    }
}
