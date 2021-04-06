<?php

namespace App\Jobs;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Hash;
use Ramsey\Uuid\Uuid;

final class RegisterUser
{
    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $username;

    /**
     * @var string
     */
    private $password;

    public function __construct(string $username, string $email, string $password)
    {
        $this->username = $username;
        $this->email    = $email;
        $this->password = $password;
    }

    public static function fromRequest(RegisterRequest $request): self
    {
        return new static(
            $request->username,
            $request->email,
            $request->password,
        );
    }

    public function handle(): User
    {
        $user = new User(
            [
                'id'                => Uuid::uuid4(),
                'username'          => $this->username,
                'email'             => $this->email,
                'password'          => Hash::make($this->password),
                'type'              => User::DEFAULT,
                //                TODO:REMOVE IT
                'email_verified_at' => \Carbon::now()->toDateTimeString(),
            ]
        );
        $user->save();

        return $user;
    }
}
