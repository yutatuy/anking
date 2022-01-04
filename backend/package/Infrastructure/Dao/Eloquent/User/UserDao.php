<?php

namespace Package\Infrastructure\Dao\Eloquent\User;
use App\Models\EloquentUser;

class UserDao {

    public function findByEmail(string $email)
    {
        return EloquentUser::where('email', $email)->first();
    }

    public function create(string $name, string $email, string $password): EloquentUser
    {
        return EloquentUser::create(
            [
                'name' => $name,
                'email' => $email,
                'password' => bcrypt($password),
            ]
        );
    }
}