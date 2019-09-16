<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $id = rand(1,200);
        $response = $this->json('POST', '/auth/register', [
            'name' => 'Sally '.$id,
            'email' => 'sally+'.$id.'@figured.com',
            'password' => bcrypt('secret')

        ]);

        $response
            ->assertStatus(405);

        $response = $this->json('POST', '/api/auth/register', [
            'name' => 'Sally '.$id,
            'email' => 'sally+'.$id.'@figured.com',
            'password' => 'secret'
        ]);

        $response
            ->assertStatus(200)
            ->assertJson([
                'status' => 'success'
            ]);
    }
}
