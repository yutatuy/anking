<?php

namespace Package\Domain\Model\Task;

interface TaskRepository
{
  public function getAll(); //TODO Task型配列を定義
  public function create(Task $Task): Task;
  public function deleteById(TaskId $id);
  // public function findByEmail(TaskEmail $email): ?Task;
}
