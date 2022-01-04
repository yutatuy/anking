<?php

namespace Package\Adapter\Converter\Wordbook;

use Package\Domain\Model\Wordbook\WordbookId;
use Package\Application\Wordbook\Fetch\WordbookFetchInput;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class WordbookFetchRequestConverter implements WordbookFetchInput {
  private $request;

  public function __construct(Request $input)
  {
    $this->request = $input;
  }

  public function getId(): WordbookId
  {
    return new WordbookId($this->request->id);
  }

}