<?php

namespace Package\Adapter\Presenter\Wordbook;

use Illuminate\Http\JsonResponse;
use Package\Adapter\Presenter\JsonPresenter;
use Package\Adapter\ViewModel\Wordbook\WordbookViewModel;
use Package\Application\Wordbook\FetchAll\WordbookFetchAllOutput;

class WordbookFetchAllPresenter extends JsonPresenter {

    public function exec(WordbookFetchAllOutput $output)
    {
        $view_model_list = [];
        foreach ($output->getData() as $value) {
            $view_model_list[] = new WordbookViewModel($value);
        }

        return $this->jsonResponse(
            [
                'wordbooks' => $view_model_list,
            ]
        );
    }
}