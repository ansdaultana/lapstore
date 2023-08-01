<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Image;
use App\Models\Product;
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
            'name' => 'Ans Nazir',
            'email' => 'ansdaultana.ad5@gmail.com',
            'is_admin' => true,
            'password' => bcrypt('12121212'),
            'email_verified_at' => now(),
        ]);

        Category::create([
            'name' => 'Laptop',

        ]);

        Category::create([
            'name' => 'Others',

        ]);

        Category::create([
            'name' => 'Accessories',

        ]);

        Product::create(
            [
                'title' => '1st laptop',
                'quantity' => 23,
                'description' => '1st laptop1st laptop1st laptop1st laptop1st laptop1st laptop1st laptop1st laptop1st laptop1st laptop1st laptop1st laptop1st laptop1st laptop1st laptop1st laptop1st laptop1st laptop1st laptop1st laptop1st laptop',
                'category_id' => 1,
                'price' => 1000,
                'created_by' => 1,
            ]
        );
        Product::create(
            [
                'title' => 'Editted with new Image',
                'quantity' => 23,
                'description' => '1st laptop1st laptop1st laptop1st laptop1st laptop1st laptop1st laptop1st laptop1st laptop1st laptop1st laptop1st laptop1st laptop1st laptop1st laptop1st laptop1st laptop1st laptop1st laptop1st laptop1st laptop',
                'category_id' => 1,
                'price' => 1000,
                'created_by' => 1,
            ]
        );
        Product::create(
            [
                'title' => 'red dragon mouse',
                'quantity' => 23,
                'description' => '1st laptop1st laptop1st laptop1st laptop1st laptop1st laptop1st laptop1st laptop1st laptop1st laptop1st laptop1st laptop1st laptop1st laptop1st laptop1st laptop1st laptop1st laptop1st laptop1st laptop1st laptop',
                'category_id' => 1,
                'price' => 1000,
                'created_by' => 1,
            ]
        );

        Image::create([
            'image_url' => 'https://res.cloudinary.com/ddrivhxfq/image/upload/f_auto,q_auto/xbqscokdjitefrwzqohj',
            'product_id' => 1,
        ]);

        Image::create([
            'image_url' => 'https://res.cloudinary.com/ddrivhxfq/image/upload/v1690140547/d4fdbjkkvxibyjx8qoep.jpg',
            'product_id' => 2,
        ]);
        Image::create([
            'image_url' => 'https://res.cloudinary.com/ddrivhxfq/image/upload/v1690400898/i1lrywcezpqaxof9nglr.webp',
            'product_id' => 3,
        ]);
    }
}