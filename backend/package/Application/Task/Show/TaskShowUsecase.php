<?php

namespace Package\Application\Task\Show;
use Package\Domain\Model\Task\TaskRepository;

class TaskShowUsecase {

  private TaskRepository $task_repository;

  public function __construct(TaskRepository $task_repository) 
  {
    $this->task_repository = $task_repository;
  }
  
  public function exec(TaskShowInput $input): TaskShowUsecaseOutput
  {
    // リポジトリを呼び出してデータを取得
    $task = $this->task_repository->findById($input->getTaskId());

    // データを返却する
    return new TaskShowUsecaseOutput($task); 
  }
}
