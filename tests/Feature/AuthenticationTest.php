<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{    
    use RefreshDatabase;
    /**
     * test_login_page_can_be_rendered
     *
     * @return void
     */
    public function test_login_page_can_be_rendered()
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }
    
    /**
     * test_user_can_be_authenticated_using_his_creadential
     *
     * @return void
     */
    public function test_user_can_be_authenticated_using_his_creadential()
    {
        $user = User::factory()->create();
        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password'
        ]);

        $this->assertAuthenticated();

        $response->assertRedirect('/home');
    }

    public function test_user_may_not_login_with_wrong_credential()
    {
        $user = User::factory()->create();
        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => '123455667'
        ]);

        // user belom login dan dia masih seorang guest
        $this->assertGuest();
    }
}
