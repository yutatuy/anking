<?php 

namespace Package\Domain\Model\Task;

class TaskId
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