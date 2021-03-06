<?php

namespace Package\Infrastructure\Dao\Eloquent\Task;

use App\Models\EloquentTask;
use Illuminate\Support\Facades\Auth;

class TaskDao
{
  public function fetchAll() //TODO Eloquentの配列を戻り値の型として定義する
  {
    $tasks = EloquentTask::all(); 
    return $tasks;
  }

  public function create(string $name, int $user_id): EloquentTask
  {
    $task = EloquentTask::create(
      [
        'name' => $name,
        'user_id' => $user_id,
      ]
    );

    return $task;
  }

  public function update(EloquentTask $task)
  {
    $task->save();
  }

  public function findById(int $id)
  {
    return EloquentTask::find($id);
  }

  public function deleteById(int $id)
  {
    $task = EloquentTask::find($id);
    // 既に削除されていたらエラーハンドリングどうする？
    $task->delete();
  }
}
