<?php

namespace Package\Application\Wordbook\Delete;

use Package\Domain\Model\Wordbook\WordbookId;
use Package\Domain\Model\Wordbook\WordbookTitle;
use Package\Domain\Model\Wordbook\WordbookIsPublic;

interface WordbookDeleteInput {
  public function getId(): WordbookId;
}