<?php

namespace Package\Infrastructure\Dao\Eloquent\Favorite;

use App\Models\EloquentFavorite;
use Illuminate\Support\Facades\Auth;

class FavoriteDao
{
    public function findByWordbookId(int $wordbook_id): EloquentFavorite
    {
        $user_id = Auth::id();
        return EloquentFavorite::where([
            'user_id' => $user_id,
            'wordbook_id' => $wordbook_id
        ])->first();
    }

    public function create(int $user_id, int $wordbook_id)
    {
        $favorite = EloquentFavorite::create(
            [
                'user_id' => $user_id,
                'wordbook_id' => $wordbook_id,
            ]
        );
    }

    public function delete(EloquentFavorite $favorite)
    {
        $favorite->delete();
    }
}
