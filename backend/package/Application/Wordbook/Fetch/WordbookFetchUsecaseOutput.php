<?php

namespace Package\Application\Wordbook\Fetch;

use Package\Domain\Model\Wordbook\Wordbook;

class WordbookFetchUsecaseOutput implements WordbookFetchOutput {

  private Wordbook $wordbook;

  public function __construct(Wordbook $wordbook)
  {
    $this->wordbook = $wordbook;
  }

  public function getWordbook(): Wordbook
  {
    return $this->wordbook;
  }
}