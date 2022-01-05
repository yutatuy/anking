<?php

namespace Package\Domain\Model\Word;

use Package\Domain\Model\User\UserId;

interface WordRepository {
  public function create(Word $wordbook);
  public function update(Word $wordbook);
  public function delete(Word $wordbook);
  public function findById(WordId $id): ?Word;
  public function fetchByWordbookId(WordWordbookId $wordbook_id): array;
}