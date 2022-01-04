<?php

namespace Package\Domain\Model\Wordbook;

class WordbookIsPublic {
  private bool $value;

  public function __construct(bool $value)
  {
    $this->value = $value;
  }

  public function value(): bool
  {
    return $this->value;
  }
}