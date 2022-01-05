<?php

namespace Package\Adapter\Converter\Word;

use Package\Application\Word\FetchByWordbookId\WordFetchByWordbookIdInput;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Package\Domain\Model\Word\WordWordbookId;

class WordFetchByWordbookIdRequestConverter implements WordFetchByWordbookIdInput {
  private $request;

  public function __construct(Request $input)
  {
    $this->request = $input;
  }

  public function getWordbookId(): WordWordbookId
  {
    return new WordWordbookId($this->request->wordbook_id);
  }
}