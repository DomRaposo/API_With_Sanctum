<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // add user
        $user = new User();
        $user->name = 'AppConsumer001';
        $user->email = 'appConsumer@gmail.com';
        $user->password = bcrypt('Aa123456');
        $user->save();

        // add user
        $user = new User();
        $user->name = 'raposo';
        $user->email = 'raposo@gmail.com';
        $user->password = bcrypt('a123456');
        $user->save();
    }
}
