<?php

namespace Package\Application\UserPlay\Create;

use Package\Domain\Model\User\UserRepository;
use Package\Domain\Model\UserPlay\UserPlay;

class UserPlayCreateUsecase {

    private UserRepository $user_repository;

    public function __construct(UserRepository $user_repository)
    {
        $this->user_repository = $user_repository;
    }

    public function exec(UserPlayCreateInput $input) 
    {
        // 現在のユーザを取得
        $user = $this->user_repository->findByAuth();

        // 作成
        $user_play = UserPlay::create($user->id(), $input->getCount()); 

        // 保存
        $this->user_repository->createUserPlay($user_play);
    }
}