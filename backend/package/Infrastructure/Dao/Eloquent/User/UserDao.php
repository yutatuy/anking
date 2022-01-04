<?php

namespace Package\Infrastructure\Dao\Eloquent\User;
use App\Models\EloquentUser;
use Illuminate\Support\Facades\Auth;

class UserDao {

    public function findByAuth(): EloquentUser
    {
        $id = Auth::id();
        return $this->findOrFail($id);
    }

    private function findOrFail(int $id): EloquentUser
    {
        return EloquentUser::query()->findOrFail($id);
    }

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