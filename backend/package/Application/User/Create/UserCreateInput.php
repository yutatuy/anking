<?php 

namespace Package\Application\User\Create;

use Package\Domain\Model\User\UserName;
use Package\Domain\Model\User\UserEmail;
use Package\Domain\Model\User\UserPassword;

interface UserCreateInput {
  public function getName(): UserName;
  public function getEmail(): UserEmail;
  public function getPassword(): UserPassword;
}