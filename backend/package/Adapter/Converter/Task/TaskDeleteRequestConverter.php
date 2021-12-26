<?php 

namespace Package\Adapter\Converter\Task;

use App\Http\Requests\TaskDeleteRequest;
use Package\Application\Task\Delete\TaskDeleteInput;
use Package\Domain\Model\Task\TaskId;
use Illuminate\Http\Request;

class TaskDeleteRequestConverter implements TaskDeleteInput
{
  private $request;

  public function __construct(TaskDeleteRequest $input)
  {
    $this->request = $input;
  }

  public function getTaskId(): TaskId
  {
    return new TaskId($this->request->id);
  }
}