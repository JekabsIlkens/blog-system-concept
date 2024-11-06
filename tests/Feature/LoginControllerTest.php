<?php

// tests/Feature/LoginControllerTest.php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;

class LoginControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_logs_in_successfully()
    {
        $user = User::factory()->create([
            'password' => Hash::make($password = 'Password123!'),
        ]);

        $response = $this->post(route('login.post'), [
            'email' => $user->email,
            'password' => $password,
        ]);

        $response->assertRedirect(route('posts.index'));
        $this->assertTrue(Auth::check());
        $this->assertEquals(Auth::user()->id, $user->id);
    }

    public function test_fails_with_unregistered_email()
    {
        $response = $this->post(route('login.post'), [
            'email' => 'unknown@mail.com',
            'password' => 'Password321!',
        ]);

        $response->assertSessionHasErrors(['email']);
        $this->assertFalse(Auth::check());
    }

    public function test_fails_with_incorrect_password()
    {
        $user = User::factory()->create([
            'password' => bcrypt('Password123!'),
        ]);

        $response = $this->post(route('login.post'), [
            'email' => $user->email,
            'password' => 'Password321!',
        ]);

        $response->assertSessionHasErrors(['error']);
        $this->assertFalse(Auth::check());
    }

    public function test_requires_an_email()
    {
        $response = $this->post(route('login.post'), [
            'password' => 'Password123!',
        ]);

        $response->assertSessionHasErrors(['email']);
    }

    public function test_requires_a_password()
    {
        $response = $this->post(route('login.post'), [
            'email' => 'tyson.mike@mail.com',
        ]);

        $response->assertSessionHasErrors(['password']);
    }
}
