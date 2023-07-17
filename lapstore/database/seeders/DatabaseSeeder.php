<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::create([
            'name'=>'Ans Nazir',
            'email'=>'admin@gmail.com',
            'is_admin'=>true,
            'password'=>bcrypt('admin1234'),
            'email_verified_at'=>now(),
        ]);
    }
}
