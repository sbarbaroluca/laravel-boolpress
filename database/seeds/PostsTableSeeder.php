<?php

use Illuminate\Database\Seeder;
use App\Post;
use Illuminate\Support\Str;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 20; $i++) {

            $post = new Post;

            $post->title = 'Titolo post ' . $i;

            $post->slug = Str::slug($post->title, '-');

            $post->body = 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Deserunt reprehenderit consectetur explicabo fugiat voluptatem sint consequuntur, amet recusandae nihil? Maiores reprehenderit veniam eum minima consequatur dolorum reiciendis, minus numquam fugiat?';

            $post->save();
        }
    }
}
