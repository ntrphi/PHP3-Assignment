<?php
use Illuminate\Database\Seeder;
class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $posts = [];
        for ($i=0; $i < 500; $i++) { 
        	$p = [
        		'title' => $faker->realText($maxNbChars = 200, $indexSize = 1),
        		'short_desc' => $faker->realText($maxNbChars = 200, $indexSize = 2),
        		'content' => $faker->realText($maxNbChars = 1200, $indexSize = 5),
        		'image' => $faker->imageUrl($width = 640, $height = 480),
        		'author' => $faker->name
        	];
        	array_push($posts, $p);
        }
        DB::table('posts')->insert($posts);
    }
}