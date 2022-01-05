<?php

namespace Package\Application\Word\Fetch;

use Package\Domain\Model\Word\Word;
use Package\Domain\Model\Word\WordRepository;
use Package\Domain\Model\User\UserRepository;

class WordFetchUsecase {

    private WordRepository $word_repository;
    private UserRepository $user_repository;

    public function __construct(WordRepository $word_repository, UserRepository $user_repository)
    {
        $this->word_repository = $word_repository;
        $this->user_repository = $user_repository;
    }

    public function exec(WordFetchInput $input): WordFetchOutput
    {
        // wordを取得
        $word = $this->word_repository->findById($input->getId());

        // 保存
        return new WordFetchUsecaseOutput($word);
    }
}