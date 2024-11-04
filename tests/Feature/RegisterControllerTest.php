<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RegisterControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_registers_user_successfully()
    {
        $response = $this->post(route('register.post'), [
            'full_name' => 'Mike Tyson',
            'email' => 'tyson.mike@mail.com',
            'password' => 'Password123!',
        ]);

        $response->assertRedirect(route('login'));
        $this->assertDatabaseHas('users', ['email' => 'tyson.mike@mail.com']);
    }

    public function test_requires_valid_email()
    {
        $response = $this->post(route('register.post'), [
            'full_name' => 'Mike Tyson',
            'email' => 'tyson#mail',
            'password' => 'Password123!',
        ]);

        $response->assertSessionHasErrors(['email']);
    }

    public function test_requires_valid_password()
    {
        $response = $this->post(route('register.post'), [
            'full_name' => 'Mike Tyson',
            'email' => 'tyson.mike@mail.com',
            'password' => 'mike1',
        ]);

        $response->assertSessionHasErrors(['password']);
    }
}