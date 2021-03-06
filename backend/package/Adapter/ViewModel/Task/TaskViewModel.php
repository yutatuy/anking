<?php

namespace Package\Adapter\ViewModel\Task;

use Package\Adapter\ViewModel\JsonViewModel;
use Package\Domain\Model\Task\Task;

class TaskViewModel implements JsonViewModel
{
  private Task $task;

  /**
   * @param Task $task
   */
  public function __construct(Task $task)
  {
    $this->task = $task;
  }

  public function getId(): int
  {
    return $this->task->id()->value();
  }

  public function getName(): string
  {
    return $this->task->name()->value();
  }

  public function getUserId(): string
  {
    return $this->task->userId()->value();
  }

  public function toArray(): array
  {
    return [
      'id' => $this->getId(),
      'name' => $this->getName(),
      'user_id' => $this->getUserId()
    ];
  }
}
