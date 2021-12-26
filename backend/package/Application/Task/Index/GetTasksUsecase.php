<?php

namespace Package\Application\Task\Index;
use Package\Domain\Model\Task\TaskRepository;

class GetTasksUsecase {

  private TaskRepository $task_repository;

  public function __construct(TaskRepository $task_repository) 
  {
    $this->task_repository = $task_repository;
  }
  
  public function exec()
  {
    // リポジトリを呼び出してデータを取得
    $tasks = $this->task_repository->getAll();

    // データを返却する
    // return new GetTasksUsecaseOutput($tasks); //TODO GetTasksUsecaseOutputを作成する
    return $tasks;
  }
}
