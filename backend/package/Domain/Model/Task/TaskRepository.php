<?php

namespace Package\Domain\Model\Task;

interface TaskRepository
{
  public function fetchAll(): array;
  public function create(Task $Task): Task;
  public function update(Task $Task): Task;
  public function deleteById(TaskId $id);
  public function findById(TaskId $id): ?Task;
}
