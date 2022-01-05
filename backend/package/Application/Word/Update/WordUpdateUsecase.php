<?php

namespace Package\Application\Word\Update;

use Package\Domain\Model\Word\Word;
use Package\Domain\Model\Word\WordRepository;

class WordUpdateUsecase {

    private WordRepository $word_repository;

    public function __construct(WordRepository $word_repository)
    {
        $this->word_repository = $word_repository;
    }

    public function exec(WordUpdateInput $input)
    {
        // 取得
        $word = $this->word_repository->findById($input->getId());

        if(is_null($word)) {
            throw new \Exception('このリストは存在しません。');
        };

        // 更新
        $word->changeFrontContent($input->getFrontContent());
        $word->changeBackContent($input->getBackContent());

        // 保存
        $this->word_repository->update($word);
    }
}