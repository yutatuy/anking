<?php

namespace App\Http\Controllers\Front\Favorite;

use App\Http\Controllers\Controller;
use Package\Adapter\Converter\Favorite\FavoriteCreateRequestConverter;
use Package\Application\Favorite\Create\FavoriteCreateUsecase;
use Package\Adapter\Converter\Favorite\FavoriteDeleteRequestConverter;
use Package\Application\Favorite\Delete\FavoriteDeleteUsecase;

class FavoriteController extends Controller
{
    public function create(
        FavoriteCreateRequestConverter $input,
        FavoriteCreateUsecase $usecase,
    )
    {
        $usecase->exec($input);
    }

    public function delete(
        FavoriteDeleteRequestConverter $input,
        FavoriteDeleteUsecase $usecase,
    )
    {
        $usecase->exec($input);
    }
}
