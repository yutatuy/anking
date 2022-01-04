<?php

namespace Package\Adapter\Gateway;

use Package\Domain\Model\Wordbook\Wordbook;
use Package\Domain\Model\Wordbook\WordbookRepository;
use Package\Infrastructure\Dao\Eloquent\Wordbook\WordbookDao;

class WordbookGateway implements WordbookRepository {
  private WordbookDao $wordbook_dao;

  public function __construct(WordbookDao $wordbook_dao)
  {
    $this->wordbook_dao = $wordbook_dao;
  }

  public function create(Wordbook $wordbook)
  {
    $title = $wordbook->title()->value();
    $user_id = $wordbook->userId()->value();
    $is_public = $wordbook->isPublic()->value();

    $this->wordbook_dao->create($title, $user_id, $is_public);
  }
}

