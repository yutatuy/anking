<?php

namespace Package\Application\Wordbook\Fetch;

use Package\Domain\Model\Wordbook\Wordbook;
use Package\Domain\Model\Wordbook\WordbookRepository;
use Package\Domain\Model\User\UserRepository;

class WordbookFetchUsecase {

    private WordbookRepository $wordbook_repository;
    private UserRepository $user_repository;

    public function __construct(WordbookRepository $wordbook_repository, UserRepository $user_repository)
    {
        $this->wordbook_repository = $wordbook_repository;
        $this->user_repository = $user_repository;
    }

    public function exec(WordbookFetchInput $input): WordbookFetchOutput
    {
        // wordbookを取得
        $wordbook = $this->wordbook_repository->findById($input->getId());

        // 保存
        return new WordbookFetchUsecaseOutput($wordbook);
    }
}