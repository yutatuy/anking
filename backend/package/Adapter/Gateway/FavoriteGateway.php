<?php

namespace Package\Adapter\Gateway;

use Package\Domain\Model\Favorite\Favorite;
use Package\Domain\Model\Wordbook\WordbookId;
use Package\Domain\Model\Favorite\FavoriteRepository;
use Package\Infrastructure\Dao\Eloquent\Favorite\FavoriteDao;
use App\Models\EloquentFavorite;

class FavoriteGateway implements FavoriteRepository {
    private FavoriteDao $favorite_dao;

    public function __construct(FavoriteDao $favorite_dao)
    {
        $this->favorite_dao = $favorite_dao;
    }

    public function create(Favorite $favorite)
    {
        $user_id = $favorite->userId()->value();
        $wordbook_id = $favorite->wordbookId()->value();

        $this->favorite_dao->create($user_id, $wordbook_id);
    }

    public function deleteByWordbookId(WordbookId $wordbook_id)
    {
        $eloquent_favorite = $this->favorite_dao->findByWordbookId($wordbook_id->value());
        if (is_null($eloquent_favorite)) return ;
        $this->favorite_dao->delete($eloquent_favorite);
    }
}

