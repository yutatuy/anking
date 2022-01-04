<?php

namespace Package\Domain\Model\User;

class User {
    private UserId $id;
    private UserEmail $email;
    private UserName $name;
    private UserPassword $password;
  
    public static function reconstruct(UserId $id, UserName $name, UserEmail $email): User
    {
        $user = new User();
        $user->id = $id;
        $user->name = $name;
        $user->email = $email;

        return $user;
    }

    public static function createFromFactory(UserName $name, UserEmail $email, UserPassword $password): User
    {
        $user = new User();
        $user->name = $name;
        $user->email = $email;
        $user->password = $password;
        return $user;
    }

    public function id(): UserId {
        return $this->id;
    }

    public function email(): UserEmail {
        return $this->email;
    }

    public function name(): UserName {
        return $this->name;
    }

    public function password(): UserPassword {
        return $this->password;
    }
}