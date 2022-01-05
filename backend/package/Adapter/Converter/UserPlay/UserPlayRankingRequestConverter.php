<?php

namespace Package\Adapter\Converter\UserPlay;

use Package\Domain\Model\UserPlay\UserPlayCount;
use Package\Application\UserPlay\Ranking\UserPlayRankingInput;
use Illuminate\Http\Request;

class UserPlayRankingRequestConverter implements UserPlayRankingInput {

  private $request;

  public function __construct(Request $input)
  {
    $this->request = $input;
  }
}

