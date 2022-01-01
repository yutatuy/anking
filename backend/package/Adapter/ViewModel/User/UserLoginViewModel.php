<?php

namespace Package\Adapter\ViewModel\User;

use Package\Adapter\ViewModel\JsonViewModel;
use Package\Domain\Model\User\User;

class UserLoginViewModel implements JsonViewModel
{
  private array $data;

  public function __construct(array $data)
  {
    $this->data = $data;
  }

  public function toArray(): array
  {
    return $this->data;
  }

}
