<?php

namespace Package\Application\Word\Fetch;

use Package\Domain\Model\Word\WordId;

interface WordFetchInput {
  public function getId(): WordId;
}