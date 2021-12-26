<?php

namespace Package\Application\Task\Delete;

use Package\Domain\Model\Task\Task;
use Package\Domain\Model\Task\TaskUserId;
use Package\Domain\Model\Task\TaskRepository;
use Package\Application\Task\Delete\TaskDeleteInput;

class TaskDeleteUsecase
{
    private TaskRepository $task_repository;

    public function __construct(
        TaskRepository $task_repository,
    ) {
        $this->task_repository = $task_repository;
    }

    public function exec(TaskDeleteInput $input)
    {
        // 削除
        $this->task_repository->deleteById($input->getTaskId());
    }
}
