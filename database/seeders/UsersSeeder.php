<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    public function run()
    {
        $user = new User();
        $user->name = 'admin';
        $user->email = 'admin@test.com';
        $user->password = bcrypt('12345');
        $user->perfiles_id = 1;
        $user->save();
    }
}
