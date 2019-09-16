<?php

use Illuminate\Database\Seeder;
use App\Models\Post;
use App\User;
use Carbon\Carbon;

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

        $user = User::where('is_admin','=',1)->first();
        for($x = 0; $x <= 10; $x++){
            $post = Post::create([
                'user_id' => $user->id,
                'title' => $faker->text,
                'contents' => $faker->realText(500),
                'published_date' => Carbon::now()->subDays(rand(1,90))->format('Y-m-d H:i:s'),
                'tags' => $faker->words(3),
                'image' => "https://picsum.photos/600/300/?image=".rand(1,30),
            ]);

        }
    }
}
