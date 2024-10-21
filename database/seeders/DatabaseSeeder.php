<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(20)->create();

        User::factory()->create([
            'name' => 'Showrabh',
            'email' => 'a@a.com',
            'password' => bcrypt('12345678')
        ]);
        DB::table('projects')->insert([
            'title' => Str::random(10),
            'image_path' => Str::random(10).'jpg',
            'category' => Str::random(10),
            'url' => Str::random(10),
        ]);
    }
}
