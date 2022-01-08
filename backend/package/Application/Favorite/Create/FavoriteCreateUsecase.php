<?php

namespace Package\Application\Favorite\Create;

use Package\Domain\Model\Favorite\FavoriteRepository;
use Package\Domain\Model\User\UserRepository;
use Package\Domain\Model\Favorite\Favorite;

class FavoriteCreateUsecase {

    private FavoriteRepository $favorite_repository;
    private UserRepository $user_repository;

    public function __construct(
        UserRepository $user_repository,
        FavoriteRepository $favorite_repository,
    )
    {
        $this->user_repository = $user_repository;
        $this->favorite_repository = $favorite_repository;
    }

    public function exec(FavoriteCreateInput $input) 
    {
        // 現在のユーザを取得
        $user = $this->user_repository->findByAuth();

        // 作成
        // TODO 同じレコードが登録されいないかFactoryでチェックする
        $favorite = Favorite::create($user->id(), $input->getWordbookId()); 

        // 保存
        $this->favorite_repository->create($favorite);
    }
}