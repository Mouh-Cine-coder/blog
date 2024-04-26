<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        /*********************************** users ***********************************/
        DB::table('users')->insert([
            'id' => 1,
            'name' => 'mod',
            'email' => 'mod@example.com',
            'description' => fake()->text(155),
            'rank' => 4,
            'review' => 2,
            'role' => 1,
            'password' => Hash::make('password'),
        ]);

        DB::table('users')->insert([
            'id' => 2,
            'name' => 'ahmed',
            'email' => 'ahmed@example.com',
            'description' => fake()->text(155),
            'rank' => 1,
            'review' => 4,
            'role' => 0,
            'password' => Hash::make('password'),
        ]);
        /***********************************************************************************/


        /*********************************** categories ***********************************/
        DB::table('categories')->insert([
            'id' => 1,
            'name' => 'front-end',
        ]);

        DB::table('categories')->insert([
            'id' => 2,
            'name' => 'vanilla',
        ]);
        /***********************************************************************************/


        /*********************************** tags ***********************************/
        DB::table('tags')->insert([
            'id' => 1,
            'name' => 'vueJs'
        ]);

        DB::table('tags')->insert([
            'id' => 2,
            'name' => 'javascript'
        ]);

        DB::table('tags')->insert([
            'id' => 3,
            'name' => 'Elexir'
        ]);

        DB::table('tags')->insert([
            'id' => 4,
            'name' => 'java'
        ]);
        /***********************************************************************************/

        
        /*********************************** articles ***********************************/
        DB::table('articles')->insert([
            'id' => 1,
            'title' => 'How to start using VuesJs: Basics of vue js',
            'body' => fake()->paragraphs(2, true),
            'user_id' => 1,
            'category_id' => 1
        ]);
        
        DB::table('articles')->insert([
            'id' => 2,
            'title' => 'Hacks for Laravel query builder',
            'body' => fake()->paragraphs(2, true),
            'user_id' => 1,
            'category_id' => 1
        ]);

        DB::table('articles')->insert([
            'id' => 3,
            'title' => 'Is Java still alive ?',
            'body' => fake()->paragraphs(2, true),
            'user_id' => 2,
            'category_id' => 2
        ]);

        DB::table('articles')->insert([
            'id' => 4,
            'title' => "Elixir programming language guide - learn why it's so admired",
            'body' => fake()->paragraphs(2, true),
            'user_id' => 2,
            'category_id' => 2
        ]);
        /***********************************************************************************/


        /*********************************** article_tag ***********************************/
        DB::table('article_tag')->insert([
            'article_id' => 1,
            'tag_id' => 1,
        ]);

        DB::table('article_tag')->insert([
            'article_id' => 1,
            'tag_id' => 2,
        ]);

        DB::table('article_tag')->insert([
            'article_id' => 3,
            'tag_id' => 3,
        ]);

        DB::table('article_tag')->insert([
            'article_id' => 4,
            'tag_id' => 3,
        ]);
        /***********************************************************************************/
    }
}
