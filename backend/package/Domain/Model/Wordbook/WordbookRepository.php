<?php

namespace Package\Domain\Model\Wordbook;

interface WordbookRepository {
  public function create(Wordbook $wordbook);
}