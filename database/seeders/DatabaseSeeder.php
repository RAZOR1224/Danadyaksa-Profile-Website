<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Team;
use App\Models\Article;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Membuat 1 user utama yang bisa Anda gunakan untuk login
        User::factory()->create([
            'name' => 'Admin Danadyaksa',
            'email' => 'admin@danadyaksa08.com',
        ]);

        // Membuat 5 anggota tim menggunakan TeamFactory
        Team::factory()->count(5)->create();

        // Membuat 12 artikel menggunakan ArticleFactory
        Article::factory()->count(12)->create();
    }
}