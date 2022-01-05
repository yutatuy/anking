<?php

namespace Package\Application\Word\Delete;

use Package\Domain\Model\Word\Word;
use Package\Domain\Model\Word\WordRepository;

class WordDeleteUsecase {

    private WordRepository $word_repository;

    public function __construct(WordRepository $word_repository)
    {
        $this->word_repository = $word_repository;
    }

    public function exec(WordDeleteInput $input)
    {
        // 取得
        $word = $this->word_repository->findById($input->getId());

        if (is_null($word)) {
            throw new \Exception('このリストは存在しません。');
        };

        // 削除
        $this->word_repository->delete($word);
    }
}