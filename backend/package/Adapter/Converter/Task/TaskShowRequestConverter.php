<?php 

namespace Package\Adapter\Converter\Task;

use App\Http\Requests\TaskShowRequest;
use Package\Application\Task\Show\TaskShowInput;
use Package\Domain\Model\Task\TaskId;
use Illuminate\Http\Request;

class TaskShowRequestConverter implements TaskShowInput
{
  private $request;

  public function __construct(TaskShowRequest $input)
  {
    $this->request = $input;
  }

  public function getTaskId(): TaskId
  {
    // return new TaskId($this->request->id);
    return new TaskId($this->request->id);
  }
}