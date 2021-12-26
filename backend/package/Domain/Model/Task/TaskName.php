<?php 

namespace Package\Domain\Model\Task;

class TaskName
{
  private $value;

  public function __construct(string $value) {
    $this->value = $value;
  }

  public function value(): string
  {
    return $this->value;
  }
}