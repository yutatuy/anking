<?php

namespace Package\Application\Wordbook\Fetch;

use Package\Domain\Model\Wordbook\Wordbook;

interface WordbookFetchOutput {
  public function getWordbook(): Wordbook;
}