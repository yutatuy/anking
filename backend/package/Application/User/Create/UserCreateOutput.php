<?php

namespace Package\Application\User\Create;

use Package\Domain\Model\User\User;

interface UserCreateOutput {
  public function getUser(): User;
}