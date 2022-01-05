<?php

namespace Package\Domain\Model\User;

use Package\Domain\Model\UserPlay\UserPlay;

interface UserRepository
{
  public function create(User $user): User;
  public function findByEmail(UserEmail $email): ?User;
  public function findByAuth(): User;
  public function createUserPlay(UserPlay $user_play);
}
