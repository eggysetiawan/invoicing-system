<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FruitCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $fruits = ['Apple', 'Mango', 'Orange', 'Guava'];

        $attr = [];
        foreach ($fruits as $fruit) {
            $data['name'] = $fruit;
            $data['slug'] = Str::slug($fruit);
            $data['created_at'] = $now = now();
            $data['updated_at'] = $now;

            $attr[] = $data;
        }

        \App\Models\FruitCategory::insert($attr);
    }
}
