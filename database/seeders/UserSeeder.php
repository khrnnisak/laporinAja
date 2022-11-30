<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'username' => 'Admin',
                'name' => 'Admin',
                'email' => 'admin@mail.com',
                'password' => bcrypt('qwertyuiop'),
                'role' => 'Admin',
            ],
            [
                'username' => 'joko',
                'name' => 'Joko',
                'email' => 'joko@mail.com',
                'password' => bcrypt('asdfghjkl'),
                'role' => 'User',
            ],
        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
