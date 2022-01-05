<?php

namespace Package\Application\Word\FetchByWordbookId;

use Package\Domain\Model\Word\WordRepository;

class WordFetchByWordbookIdUsecase {

    private WordRepository $word_repository;

    public function __construct(WordRepository $word_repository)
    {
        $this->word_repository = $word_repository;
    }

    public function exec(WordFetchByWordbookIdInput $input): WordFetchByWordbookIdOutput
    {
        // 取得
        $word_list = $this->word_repository->fetchByWordbookId($input->getWordbookId());

        // 出力
        return new WordFetchByWordbookIdUsecaseOutput($word_list);
    }
}