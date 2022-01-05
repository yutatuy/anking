<?php

namespace App\Http\Controllers\Front\UserPlay;

use App\Http\Controllers\Controller;
use Package\Adapter\Converter\UserPlay\UserPlayCreateRequestConverter;
use Package\Application\UserPlay\Create\UserPlayCreateUsecase;

class UserPlayController extends Controller
{
    public function userRanking()
    {

    }

    public function create(
        UserPlayCreateRequestConverter $input,
        UserPlayCreateUsecase $usecase
    )
    {
        $usecase->exec($input);
    }
}
