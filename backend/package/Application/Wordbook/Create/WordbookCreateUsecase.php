<?php

namespace Package\Application\Wordbook\Create;

use Package\Domain\Model\Wordbook\Wordbook;
use Package\Domain\Model\Wordbook\WordbookRepository;

class WordbookCreateUsecase {

  private WordbookRepository $wordbook_repository;

  public function __construct(WordbookRepository $wordbook_repository)
  {
      $this->wordbook_repository = $wordbook_repository;
  }

  public function exec(WordbookCreateInput $input)
  {
    // 作成
    $wordbook = Wordbook::create($input->getTitle(), $input->getUserId(), $input->getIsPublic());

    // 保存
    $created_wordbook = $this->wordbook_repository->create($wordbook);

  }
}