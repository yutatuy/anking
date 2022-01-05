<?php

namespace Package\Adapter\Converter\UserPlay;

use Package\Domain\Model\UserPlay\UserPlayCount;
use App\Http\Requests\UserPlayCreateRequest;
use Package\Application\UserPlay\Create\UserPlayCreateInput;

class UserPlayCreateRequestConverter implements UserPlayCreateInput {

  private $request;

  public function __construct(UserPlayCreateRequest $input)
  {
    $this->request = $input;
  }

  public function getCount(): UserPlayCount
  {
    return new UserPlayCount($this->request->count);
  }
}

