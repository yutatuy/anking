<?php

namespace Package\Domain\Model\Wordbook;

use Package\Domain\Model\User\UserId;

interface WordbookRepository {
  public function create(Wordbook $wordbook);
  public function fetchAll(UserId $user_id): array;
}