<?php

namespace Package\Application\User\Login;
use Package\Domain\Model\User\UserEmail;
use Package\Domain\Model\User\UserPassword;

interface UserLoginInput {
  public function getUserEmail(): UserEmail;
  public function getUserPassword(): UserPassword;
}