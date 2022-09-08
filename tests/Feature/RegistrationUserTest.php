<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class RegistrationUserTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    // public function test_example()
    // {
    //     $response = $this->get('/');

    //     $response->assertStatus(200);
    // }
    
    /**
     * test_registration_page_can_be_rendered
     *
     * @return void
     */
    public function test_registration_page_can_be_rendered()
    {
        $this->withoutExceptionHandling();
        $response = $this->get('register');
        
        $response->assertStatus(200);
    }

    public function test_anyone_can_be_registered()
    {
        $user = User::factory()->make();

        $reponse = $this->post('register', $user->toArray());

        // authentikasi
        $this->assertAuthenticated();

        $reponse->assertRedirect('/home');
    }
}
