<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class LoginTest extends TestCase
{
    public function testForm(): void
    {
        $response = $this->get('/login');
        $response
            ->assertSuccessful()
            ->assertSee('Login');
    }

    public function testErrors(): void
    {
        $this->withoutMiddleware();
        $response = $this->post('/login', [
            'email' => '',
            'password' => '',
        ]);
        $response
            ->assertStatus(302)
            ->assertSessionHasErrors(['email', 'password']);
    }
}
