<?php

namespace Package\Application\Wordbook\Update;

use Package\Domain\Model\Wordbook\Wordbook;
use Package\Domain\Model\Wordbook\WordbookRepository;

class WordbookUpdateUsecase {

    private WordbookRepository $wordbook_repository;

    public function __construct(WordbookRepository $wordbook_repository)
    {
        $this->wordbook_repository = $wordbook_repository;
    }

    public function exec(WordbookUpdateInput $input)
    {
        // 取得
        $wordbook = $this->wordbook_repository->findById($input->getId());

        if(is_null($wordbook)) {
            throw new \Exception('このリストは存在しません。');
        };

        // 更新
        $wordbook->changeTitle($input->getTitle());
        $wordbook->changeIsPublic($input->getIsPublic());

        // 保存
        $this->wordbook_repository->update($wordbook);
    }
}