<?php

namespace Package\Domain\Model\Word;

class WordId {
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