<?php

namespace Package\Adapter\Converter\Wordbook;

use Package\Domain\Model\Wordbook\WordbookUserId;
use Package\Application\Wordbook\FetchAll\WordbookFetchAllInput;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class WordbookFetchAllRequestConverter implements WordbookFetchAllInput {
  private $request;

  public function __construct(Request $input)
  {
    $this->request = $input;
  }

  // TODOクエリパラメータはどうする？

}