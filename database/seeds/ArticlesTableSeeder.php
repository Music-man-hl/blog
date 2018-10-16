<?php

use Illuminate\Database\Seeder;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Article::class, 10000)->create()->each(function ($a) {
            $a->comments()->save(factory(App\Comment::class)->create(['article_id' => $a->id]));
        });
    }
}
