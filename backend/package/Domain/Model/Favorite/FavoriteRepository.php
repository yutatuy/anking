<?php

namespace Package\Domain\Model\Favorite;

use Package\Domain\Model\Favorite\Favorite;
use Package\Domain\Model\Wordbook\WordbookId;

interface FavoriteRepository {
  public function create(Favorite $favorite);
  public function deleteByWordbookId(WordbookId $wordbook_id);
}