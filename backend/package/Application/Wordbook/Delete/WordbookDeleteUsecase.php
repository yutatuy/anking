<?php

namespace Package\Application\Wordbook\Delete;

use Package\Domain\Model\Wordbook\Wordbook;
use Package\Domain\Model\Wordbook\WordbookRepository;

class WordbookDeleteUsecase {

    private WordbookRepository $wordbook_repository;

    public function __construct(WordbookRepository $wordbook_repository)
    {
        $this->wordbook_repository = $wordbook_repository;
    }

    public function exec(WordbookDeleteInput $input)
    {
        // 取得
        $wordbook = $this->wordbook_repository->findById($input->getId());

        if(is_null($wordbook)) {
            throw new \Exception('このリストは存在しません。');
        };

        // 削除
        $this->wordbook_repository->delete($wordbook);
    }
}