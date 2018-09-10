<?php

namespace Tests\Feature;

use App\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /** @test */
    public function databaseIsConnected()
    {
        factory(User::class)->create(['email' => 'test@example.com']);

        $this->assertDatabaseHas('users', ['email' => 'test@example.com']);
    }
}
