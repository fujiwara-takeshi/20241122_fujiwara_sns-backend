<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class UserControllerTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_store_user()
    {
        $data = [
            'name' => 'takeshi fujiwara',
            'email' => 'test@example.com',
            'password' => 'password',
        ];
        $response = $this->post('/api/user', $data);
        $response->assertStatus(201);
        $response->assertJsonFragment([
            'name' => 'takeshi fujiwara',
            'email' => 'test@example.com',
        ]);
        $this->assertDatabaseHas('users', $data);
    }
}
