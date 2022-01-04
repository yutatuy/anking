<?php

namespace Package\Domain\Model\User;

interface UserRepository
{
  public function create(User $user): User;
  public function findByEmail(UserEmail $email): ?User;
  public function findByAuth(): User;
}
