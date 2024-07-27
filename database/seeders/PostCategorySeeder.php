<?php

namespace Database\Seeders;

use App\Models\PostCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PostCategory::create([
            'title_kk'=>'Жас бойынша вакцина',
            'title_ru'=>'Вакцина по возрасту',
            'slug'=>'vaccine-by-age',
            'parent_id'=>NULL,
            'sort'=>0
        ]);
    }
}
