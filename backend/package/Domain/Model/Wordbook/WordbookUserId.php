<?php

namespace Package\Domain\Model\Wordbook;

class WordbookUserId {
  private int $value;

  public function __construct(int $value)
  {
    $this->value = $value;
  }

  public function value(): int
  {
    return $this->value;
  }
}