<?php

namespace Package\Application\Wordbook\Update;

use Package\Domain\Model\Wordbook\WordbookId;
use Package\Domain\Model\Wordbook\WordbookTitle;
use Package\Domain\Model\Wordbook\WordbookIsPublic;

interface WordbookUpdateInput {
  public function getId(): WordbookId;
  public function getTitle(): WordbookTitle;
  public function getIsPublic(): WordbookIsPublic;
}