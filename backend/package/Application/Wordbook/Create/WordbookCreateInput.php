<?php

namespace Package\Application\Wordbook\Create;

use Package\Domain\Model\Wordbook\WordbookTitle;
use Package\Domain\Model\Wordbook\WordbookUserId;
use Package\Domain\Model\Wordbook\WordbookIsPublic;

interface WordbookCreateInput {
  public function getTitle(): WordbookTitle;
  public function getUserId(): WordbookUserId;
  public function getIsPublic(): WordbookIsPublic;
}