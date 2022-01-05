<?php

namespace Package\Application\UserPlay\Ranking;

use Package\Domain\Model\User\UserRepository;
use Package\Domain\Model\UserPlay\UserPlay;

class UserPlayRankingUsecase {

    private UserRepository $user_repository;

    public function __construct(UserRepository $user_repository)
    {
        $this->user_repository = $user_repository;
    }

    public function exec(UserPlayRankingInput $input): UserPlayRankingOutput
    {
        // 現在のユーザを取得
        $users = $this->user_repository->sordByPlayCount();

        return new UserPlayRankingUsecaseOutput($users);
    }
}