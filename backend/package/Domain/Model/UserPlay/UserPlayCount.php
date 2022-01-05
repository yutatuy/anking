<?php

namespace Package\Domain\Model\UserPlay;

class UserPlayCount {
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