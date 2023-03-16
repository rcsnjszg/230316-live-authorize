<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin1 = new User();
        $admin1->name = "Admin";
        $admin1->email = "admin@example.com";
        $admin1->password = Hash::make("password1234");
        $admin1->role = "admin";
        $admin1->save();

        $root = new User();
        $root->name = "root";
        $root->email = "root@example.com";
        $root->password = Hash::make("password1234");
        $root->role = "root";
        $root->save();
    }
}
