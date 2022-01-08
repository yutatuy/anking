<?php 

namespace Package\Application\Favorite\Delete;

use Package\Domain\Model\Wordbook\WordbookId;

interface FavoriteDeleteInput {
  public function getWordbookId(): WordbookId;
}