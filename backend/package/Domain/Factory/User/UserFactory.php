<?php

namespace Package\Domain\Factory\User;

use Package\Domain\Model\User\User;
use Package\Domain\Model\User\UserEmail;
use Package\Domain\Model\User\UserName;
use Package\Domain\Model\User\UserPassword;
use Package\Domain\Model\User\UserRepository;

class UserFactory {
  private UserRepository $user_repository;

  public function __construct(UserRepository $user_repository)
  {
    $this->user_repository = $user_repository;
  }

  public function exec(UserName $name, UserEmail $email, UserPassword $password):User
  {
    // ユーザが既に存在していたらエラー
    if(!is_null($this->user_repository->findByEmail($email))) {
      throw new \Exception('既にメールアドレスが登録されています');
    }

    return User::createFromFactory($name, $email, $password);
  }
}