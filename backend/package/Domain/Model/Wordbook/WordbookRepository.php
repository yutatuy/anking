<?php

namespace Package\Domain\Model\Wordbook;

use Package\Domain\Model\User\UserId;

interface WordbookRepository {
  public function create(Wordbook $wordbook);
  public function update(Wordbook $wordbook);
  public function delete(Wordbook $wordbook);
  public function fetchAll(): array;
  public function findById(WordbookId $id): ?Wordbook;
}