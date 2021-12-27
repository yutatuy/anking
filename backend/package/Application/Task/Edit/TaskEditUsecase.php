<?php

namespace Package\Application\Task\Edit;

use Package\Domain\Model\Task\Task;
use Package\Domain\Model\Task\TaskUserId;
use Package\Domain\Model\Task\TaskRepository;
use Package\Application\Task\Edit\TaskEditInput;
use Package\Application\Task\Edit\TaskEditUsecaseOutput;

class TaskEditUsecase
{
    private TaskRepository $task_repository;

    public function __construct(
        TaskRepository $task_repository,
    ) {
        $this->task_repository = $task_repository;
    }

    public function exec(TaskEditInput $input)
    {
        // タスク取得
        $task = $this->task_repository->findById($input->getTaskId());
        
        // nameを変更
        $task->changeName($input->getTaskName());

        // タスクの更新
        $changed_task = $this->task_repository->update($task);

        return new TaskEditUsecaseOutput($changed_task);
    }
}
