<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
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
            'email'=>'ansdaultana.ad5@gmail.com',
            'is_admin'=>true,
            'password'=>bcrypt('12121212'),
            'email_verified_at'=>now(),
        ]);

        Category::create([
            'name'=>'Laptop',

        ]);
        
        Category::create([
            'name'=>'Others',

        ]);
    
        Category::create([
            'name'=>'Accessories',

        ]);
    }
}
