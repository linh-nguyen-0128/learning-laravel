<?php

namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Post;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('posts')->delete();
        $faker = \Faker\Factory::create('en_EN');
        $limit = 100;

        for ($i = 0; $i < $limit; $i++) {
            Post::create([
                'id' => $faker->unique()->ean8,
                'hash_id' => $faker->uuid(),
                'title' => $faker->name,
                'content' => $faker->text
            ]);
        }
    }
}
