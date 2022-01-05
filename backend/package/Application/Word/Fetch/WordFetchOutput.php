<?php

namespace Package\Application\Word\Fetch;

use Package\Domain\Model\Word\Word;

interface WordFetchOutput {
  public function getWord(): Word;
}