<?php

namespace Package\Application\Task\Index;
use Package\Domain\Model\Task\TaskRepository;

class TasksGetUsecase {

  private TaskRepository $task_repository;

  public function __construct(TaskRepository $task_repository) 
  {
    $this->task_repository = $task_repository;
  }
  
  public function exec()
  {
    // リポジトリを呼び出してデータを取得
    $tasks = $this->task_repository->fetchAll();

    // データを返却する
    return $tasks;
  }
}
