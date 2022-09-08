<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HomePageTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_homepage_can_be_rendered_if_user_authenticated()
    {
        // $this->withoutExceptionHandling();
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->get('/home');

        $response->assertStatus(200);
    }

    public function test_redirect_if_user_not_authenticated()
    {
        $response = $this->get('/home');
        $response->assertRedirect(route('login'));
    }
}
