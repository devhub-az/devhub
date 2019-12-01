<?php

namespace Tests\Feature\Auth;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use App\Models\User;

class LoginTest extends TestCase
{

    use DatabaseTransactions;

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

    public function testWait(): void
    {
        $this->withoutMiddleware();
        $user = factory(User::class)->create();
        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'secret',
        ]);
        $response
            ->assertStatus(302)
            ->assertRedirect('/');
    }
}
