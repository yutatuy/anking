<?php 

namespace Package\Adapter\Converter\Task;

use App\Http\Requests\TaskEditRequest;
use Package\Application\Task\Edit\TaskEditInput;
use Package\Domain\Model\Task\TaskName;
use Package\Domain\Model\Task\TaskId;
use Illuminate\Http\Request;

class TaskEditRequestConverter implements TaskEditInput
{
  private $request;

  public function __construct(TaskEditRequest $input)
  {
    $this->request = $input;
  }

  public function getTaskName(): TaskName
  {
    return new TaskName($this->request->name);
  }

  public function getTaskId(): TaskId
  {
    return new TaskId($this->request->id);
  }
}