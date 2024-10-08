<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FoodCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $foodCategories = [
            ['category_name' => 'Appetizers', 'created_at' => now(), 'updated_at' => now()],
            ['category_name' => 'Main Courses', 'created_at' => now(), 'updated_at' => now()],
            ['category_name' => 'Desserts', 'created_at' => now(), 'updated_at' => now()],
            ['category_name' => 'Beverages', 'created_at' => now(), 'updated_at' => now()],
            ['category_name' => 'Snacks', 'created_at' => now(), 'updated_at' => now()],
            ['category_name' => 'Salads', 'created_at' => now(), 'updated_at' => now()],
            ['category_name' => 'Soups', 'created_at' => now(), 'updated_at' => now()],
            ['category_name' => 'Breakfast', 'created_at' => now(), 'updated_at' => now()],
            ['category_name' => 'Vegan', 'created_at' => now(), 'updated_at' => now()],
            ['category_name' => 'Gluten-Free', 'created_at' => now(), 'updated_at' => now()],
        ];

        DB::table('categories')->insert($foodCategories);
    }
}
