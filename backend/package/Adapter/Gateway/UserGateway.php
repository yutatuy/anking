<?php

namespace Package\Adapter\Gateway;

use Package\Domain\Model\User\UserRepository;
use App\Models\EloquentUser;
use Package\Domain\Model\User\User;
use Package\Domain\Model\User\UserId;
use Package\Domain\Model\User\UserName;
use Package\Domain\Model\User\UserEmail;
use Package\Domain\Model\User\UserPassword;
use Package\Domain\Model\UserPlay\UserPlay;
use Package\Infrastructure\Dao\Eloquent\User\UserDao;

class UserGateway implements UserRepository{
    private UserDao $user_dao;

    public function __construct(UserDao $user_dao)
    {
        $this->user_dao = $user_dao;
    }

    public function create(User $user): User
    {
        $name = $user->name()->value();
        $email = $user->email()->value();
        $password = $user->password()->value();

        $eloquent_user = $this->user_dao->create($name, $email, $password);
        return $this->createFromEloquent($eloquent_user);
    }

    public function findByAuth(): User
    {
        $eloquent_user = $this->user_dao->findByAuth();
        return $this->createFromEloquent($eloquent_user);
    }

    public function sordByPlayCount(): array
    {
        $eloquent_user_list = $this->user_dao->sordByPlayCount();
        $user_list = [];
        foreach ($eloquent_user_list as $eloquent_user) {
            $user_list[] = $this->createFromEloquent($eloquent_user);
        }

        return $user_list;
    }

    public function findByEmail(UserEmail $email): ?User
    {
        $eloquent_user = $this->user_dao->findByEmail($email->value());
        if (is_null($eloquent_user)) return null;
        return $this->createFromEloquent($eloquent_user);
    }

    public function createUserPlay(UserPlay $user_play)
    {
        $this->user_dao->createUserPlay($user_play->userId()->value(), $user_play->count()->value());
    }

    private function createFromEloquent(EloquentUser $eloquent_user): User
    {
        $id = new UserId($eloquent_user->id);
        $name = new UserName($eloquent_user->name);
        $email = new UserEmail($eloquent_user->email);
        return User::reconstruct($id, $name, $email);
    }
}