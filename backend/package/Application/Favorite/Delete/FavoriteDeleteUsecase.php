<?php

namespace Package\Application\Favorite\Delete;

use Package\Domain\Model\Favorite\FavoriteRepository;
use Package\Domain\Model\User\UserRepository;
use Package\Domain\Model\Favorite\Favorite;

class FavoriteDeleteUsecase {
    private FavoriteRepository $favorite_repository;

    public function __construct(
        FavoriteRepository $favorite_repository,
    )
    {
        $this->favorite_repository = $favorite_repository;
    }

    public function exec(FavoriteDeleteInput $input) 
    {
        $this->favorite_repository->deleteByWordbookId($input->getWordbookId());
    }
}