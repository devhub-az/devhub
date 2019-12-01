<?php

namespace Tests\Feature\Auth;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use App\Models\User;

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
