<?php

namespace Package\Application\Wordbook\FetchAll;

use Package\Domain\Model\Wordbook\Wordbook;
use Package\Domain\Model\Wordbook\WordbookRepository;
use Package\Domain\Model\User\UserRepository;

class WordbookFetchAllUsecase {

    private WordbookRepository $wordbook_repository;
    private UserRepository $user_repository;

    public function __construct(WordbookRepository $wordbook_repository, UserRepository $user_repository)
    {
        $this->wordbook_repository = $wordbook_repository;
        $this->user_repository = $user_repository;
    }

    public function exec(WordbookFetchAllInput $input): WordbookFetchAllOutput
    {
        // 取得
        $wordbook_list = $this->wordbook_repository->fetchAll();

        // 出力
        return new WordbookFetchAllUsecaseOutput($wordbook_list);
    }
}