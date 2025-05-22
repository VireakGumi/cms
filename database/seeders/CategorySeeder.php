<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = ['name' => 'vireak', 'email'=> 'vireak@gmail.com', 'password' => '12345678'];
        User::create($user);
        $categories = [
            ['name' => 'Funny'],
            ['name' => 'Creativity'],
            ['name' => 'Inspiration'],
            ['name' => 'Motivation'],
            ['name' => 'Education'],
            ['name' => 'Technology'],
            ['name' => 'Health'],
            ['name' => 'Travel'],
            ['name' => 'Food'],
            ['name' => 'Lifestyle'],
            ['name' => 'Business'],
            ['name' => 'Entertainment'],
            ['name' => 'News'],
            ['name' => 'Sports'],
            ['name' => 'Fashion'],
            ['name' => 'Art'],
            ['name' => 'Music'],
            ['name' => 'Photography'],
            ['name' => 'Film'],
            ['name' => 'Gaming'],
            ['name' => 'Science'],
            ['name' => 'Nature'],
            ['name' => 'Animals'],
            ['name' => 'History'],
            ['name' => 'Culture'],
            ['name' => 'Language'],
            ['name' => 'Religion'],
            ['name' => 'Philosophy'],
            ['name' => 'Politics'],
            ['name' => 'Economics'],
            ['name' => 'Psychology'],
            ['name' => 'Sociology'],
            ['name' => 'Anthropology'],
            ['name' => 'Geography'],
            ['name' => 'Mathematics'],
            ['name' => 'Physics'],
            ['name' => 'Chemistry'],
            ['name' => 'Biology'],
            ['name' => 'Astronomy'],
        ];
        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
