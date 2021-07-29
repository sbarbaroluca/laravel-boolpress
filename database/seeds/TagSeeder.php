<?php
use App\Tag;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = [
            'PHP',
            'CSS',
            'HTML',
            'JavaScript',
            'Laravel',
            'Vue.js',
            'Python',
            'Java',
            'Ruby',
            'React.js'
        ];

        foreach($tags as $tag) {

            $newTag = new Tag();

            $newTag->name = $tag;
            $newTag->slug = Str::slug($tag, '-');

            $newTag->save();
        }
    }
}
