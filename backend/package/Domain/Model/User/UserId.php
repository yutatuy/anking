<?php

namespace Package\Domain\Model\User;

class UserId {
  private int $value;
  
  public function __construct(int $value) {
    $this->value = $value;
  }

  public function value() {
    return $this->value;
  }

}