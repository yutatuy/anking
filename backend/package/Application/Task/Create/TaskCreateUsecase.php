<?php

namespace Package\Application\Task\Create;

use Package\Domain\Model\Task\Task;
use Package\Domain\Model\Task\TaskUserId;
use Package\Domain\Model\Task\TaskRepository;
use Package\Application\Task\Create\TaskCreateInput;
use Package\Application\Task\Create\TaskCreateUsecaseOutput;

class TaskCreateUsecase
{
    private TaskRepository $task_repository;

    public function __construct(
        TaskRepository $task_repository,
    ) {
        $this->task_repository = $task_repository;
    }

    public function exec(TaskCreateInput $input)
    {
        $user_id = new TaskUserId(1); // TODO とりあえず決め打ち。ログイン機能実装後にログイン中のユーザのID取得するようにする。

        // タスク生成
        $task = Task::create($input->getTaskName(), $user_id);

        // 保存
        $created_task = $this->task_repository->create($task);

        return new TaskCreateUsecaseOutput($created_task);
    }
}
