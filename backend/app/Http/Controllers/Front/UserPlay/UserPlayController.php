<?php

namespace App\Http\Controllers\Front\UserPlay;

use App\Http\Controllers\Controller;
use Package\Adapter\Converter\UserPlay\UserPlayCreateRequestConverter;
use Package\Application\UserPlay\Create\UserPlayCreateUsecase;
use Package\Adapter\Converter\UserPlay\UserPlayRankingRequestConverter;
use Package\Application\UserPlay\Ranking\UserPlayRankingUsecase;
use Package\Adapter\Presenter\UserPlay\UserPlayRankingPresenter;

class UserPlayController extends Controller
{
    public function ranking(
        UserPlayRankingRequestConverter $input,
        UserPlayRankingUsecase $usecase,
        UserPlayRankingPresenter $presenter
    )
    {
        $output = $usecase->exec($input);
        return $presenter->exec($output);
    }

    public function create(
        UserPlayCreateRequestConverter $input,
        UserPlayCreateUsecase $usecase,
    )
    {
        $usecase->exec($input);
    }
}
