<?php 

namespace Package\Application\Favorite\Create;

use Package\Domain\Model\Wordbook\WordbookId;

interface FavoriteCreateInput {
  public function getWordbookId(): WordbookId;
}