<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
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
        User::query()->insert([
            [
                "id" => 1,
                "name" => "Joan Andreas",
                "email" => "jadr02@gmail.com",
                "password" => Hash::make("Uas12345"),
                "gender" => "Female",
                "role" => "Member",
                "displayPicture" => ""
            ],
            [
                "id" => 2,
                "name" => "Admin",
                "email" => "admin@mail.com",
                "password" => Hash::make("Uas12345"),
                "gender" => "Male",
                "role" => "Admin",
                "displayPicture" => ""
            ],
        ]);
    }
}