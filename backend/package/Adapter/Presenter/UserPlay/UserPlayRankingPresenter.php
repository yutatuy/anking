<?php

namespace Package\Adapter\Presenter\UserPlay;

use Illuminate\Http\JsonResponse;
use Package\Adapter\Presenter\JsonPresenter;
use Package\Adapter\ViewModel\User\UserViewModel;
use Package\Application\UserPlay\Ranking\UserPlayRankingOutput;

class UserPlayRankingPresenter extends JsonPresenter {

    public function exec(UserPlayRankingOutput $output)
    {
        $view_model_list = [];
        foreach ($output->getData() as $value) {
            $view_model_list[] = new UserViewModel($value);
        }

        return $this->jsonResponse(
            [
                'status' => 'success',
                'wordbooks' => $view_model_list,
            ]
        );
    }
}