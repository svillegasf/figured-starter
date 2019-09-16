<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Carbon\Carbon;

class PostTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $faker = \Faker\Factory::create();

        $id = rand(1,200);
        $title = $faker->text;
        $response = $this->json('POST', '/api/posts', [
            'title' => $title,
            'contents' => $faker->realText(2000),
            'image' => "https://picsum.photos/600/300/?image=".rand(1,30),
            'user_id' => 1,
            'tags' => ['one','two','three'],
            'published_date' => Carbon::now()->subDays(rand(1,90))->format('Y-m-d H:i:s'),
        ]);

        $response
            ->assertStatus(200)
            ->assertJson([
                'title' => $title,
                'views' => 0,
            ]);
        }
}
