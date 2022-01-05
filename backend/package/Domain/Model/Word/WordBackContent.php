<?php

namespace Package\Domain\Model\Word;

class WordBackContent {
  private string $value;

  public function __construct(string $value)
  {
    $this->value = $value;
  }

  public function value(): string
  {
    return $this->value;
  }
}