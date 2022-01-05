<?php

namespace Package\Application\Word\Fetch;

use Package\Domain\Model\Word\Word;

class WordFetchUsecaseOutput implements WordFetchOutput {

  private Word $word;

  public function __construct(Word $word)
  {
    $this->word = $word;
  }

  public function getWord(): Word
  {
    return $this->word;
  }
}