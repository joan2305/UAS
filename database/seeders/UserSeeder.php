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
                "firstName" => "Joan",
                "lastName" => " Andreas",
                "email" => "jadr02@gmail.com",
                "password" => Hash::make("Uas12345"),
                "gender" => "Female",
                "role" => "User",
                "displayPicture" => "fcd3f82dc7a92b6c1e27b460263c62b5.jpg",
                "originalImageName"=> "happy.jpg"
            ],
            [
                "id" => 2,
                "firstName" => "Admin",
                "lastName" => " ",
                "email" => "admin@mail.com",
                "password" => Hash::make("Uas12345"),
                "gender" => "Male",
                "role" => "Admin",
                "displayPicture" => "fcd3f82dc7a92b6c1e27b460263c62b5.jpg",
                "originalImageName"=> "happy.jpg"
            ],
        ]);
    }
}