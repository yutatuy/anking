<?php 

namespace Package\Application\User\Create;

use Package\Domain\Model\User\User;

class UserCreateUsecaseOutput implements UserCreateOutput {
  private User $user;

  public function __construct(User $user)
  {
    $this->user = $user;
  }

  public function getUser(): User
  {
    return $this->user;
  }
}