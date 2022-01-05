<?php

namespace Package\Adapter\Converter\Word;

use Package\Domain\Model\Word\WordId;
use Package\Application\Word\Fetch\WordFetchInput;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class WordFetchRequestConverter implements WordFetchInput {
  private $request;

  public function __construct(Request $input)
  {
    $this->request = $input;
  }

  public function getId(): WordId
  {
    return new WordId($this->request->id);
  }

}