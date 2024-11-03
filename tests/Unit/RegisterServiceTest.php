<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Http\Services\RegisterService;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RegisterServiceTest extends TestCase
{
    use RefreshDatabase;

    public function test_creates_user_successfully()
    {
        $service = new RegisterService();

        $data = [
            'full-name' => 'Mike Tyson',
            'email' => 'tyson.mike@mail.com',
            'password' => 'Password123!'
        ];

        $user = $service->createUser($data);

        $this->assertDatabaseHas('users', [
            'email' => 'tyson.mike@mail.com'
        ]);

        $this->assertTrue(Hash::check('Password123!', $user->password));
    }
}