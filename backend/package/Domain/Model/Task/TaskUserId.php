<?php 

namespace Package\Domain\Model\Task;

class TaskUserId
{
  private $value;

  public function __construct(int $value) {
    $this->value = $value;
  }

  public function value(): int
  {
    return $this->value;
  }
}