<?php

namespace Package\Application\User\Create;

use Package\Domain\Model\User\UserRepository;
use Package\Domain\Factory\User\UserFactory;

class UserCreateUsecase {

  private UserRepository $user_repository;
  private UserFactory $user_factory;

  public function __construct(UserRepository $user_repository, UserFactory $user_factory)
  {
    $this->user_repository = $user_repository;
    $this->user_factory = $user_factory;
  }

  public function exec(UserCreateInput $input): UserCreateOutput {
    
    // ユーザを作成
    $user = $this->user_factory->exec($input->getName(), $input->getEmail(), $input->getPassword());

    // ユーザを保存
    $created_user = $this->user_repository->create($user);

    // TODO: メールを送信する

    // ユーザを返す
    return new UserCreateUsecaseOutput($created_user);
  }
}