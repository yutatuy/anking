<?php

namespace Package\Application\Word\Create;

use Package\Domain\Model\Word\Word;
use Package\Domain\Model\Word\WordRepository;

class WordCreateUsecase {

    private WordRepository $word_repository;

    public function __construct(WordRepository $word_repository)
    {
        $this->word_repository = $word_repository;
    }

    public function exec(WordCreateInput $input)
    {
        // 作成
        $word = Word::create($input->getWordbookId(), $input->getFrontContent(), $input->getBackContent());

        // 保存
        $this->word_repository->create($word);
    }
}