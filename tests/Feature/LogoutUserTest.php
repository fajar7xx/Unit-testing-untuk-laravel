<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LogoutUserTest extends TestCase
{
    use RefreshDatabase;    

    /**
     * test_user_logged_in_can_be_logout
     *
     * @return void
     */
    public function test_user_logged_in_can_be_logout()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->post('logout');
        
        $response->assertSessionHas('message');
        $response->assertRedirect(route('login'));
    }
}
