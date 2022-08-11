<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;
use App\Models\User;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = [
            [
               'fullname'=>'Admin',
               'email'=>'admin@gmail.com',
               'password'=> bcrypt('admin123@'),
            ],
        ];
    
        foreach ($admin as $key => $user) {
            Admin::create($user);
        }

         $users = [
            [
               'fullname'=>'Admin',
               'email'=>'admin@gmail.com',
               'password'=> bcrypt('admin123@'),
            ],
        ];
    
        foreach ($users as $key => $user) {
            User::create($user);
        }

    }
}
