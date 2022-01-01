<?php 

namespace Package\Application\User\Login;

class UserLoginUsecaseOutput implements UserLoginOutput {
  private $data;

  public function __construct(array $data)
  {
    $this->data = $data;
  }

  public function getData(): array
  {
    return $this->data;
  }
}