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
    private $name;

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

    /**
     * @var array
     */
    private $image;

    public function __construct(string $name, string $email, string $username, string $password, UploadedFile $image)
    {
        $this->name = $name;
        $this->email = $email;
        $this->username = $username;
        $this->password = $password;
        $this->image = $image;
    }

    public static function fromRequest(RegisterRequest $request): self
    {
        return new static(
            $request->name,
            $request->email,
            $request->username,
            $request->password,
            $request->image
        );
    }

    public function handle(): User
    {
        $user = new User(
            [
                'id'       => Uuid::uuid4(),
                'name'     => $this->name,
                'username' => $this->username,
                'avatar'   => $this->image->getClientOriginalName(),
                'email'    => $this->email,
                'password' => Hash::make($this->password),
                'type'     => User::DEFAULT,
            ]
        );
        $user->addMedia($this->image)->toMediaCollection('avatars');
        $user->save();

        return $user;
    }
}
