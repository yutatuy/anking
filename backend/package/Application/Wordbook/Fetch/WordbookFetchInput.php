<?php

namespace Package\Application\Wordbook\Fetch;

use Package\Domain\Model\Wordbook\WordbookId;

interface WordbookFetchInput {
  public function getId(): WordbookId;
}