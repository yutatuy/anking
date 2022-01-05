<?php

namespace Package\Application\Wordbook\Delete;

use Package\Domain\Model\Wordbook\WordbookId;

interface WordbookDeleteInput {
  public function getId(): WordbookId;
}