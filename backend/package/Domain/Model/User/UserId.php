<?php

namespace Package\Domain\Model\User;

class UserId {
  private int $value;
  
  public __construct(int $value) {
    $this->value = $value;
  }

  public value() {
    return $this->value;
  }

}