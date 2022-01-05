<?php

namespace Package\Domain\Model\Word;

class WordWordbookId {
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