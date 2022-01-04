<?php

namespace Package\Adapter\Presenter\Wordbook;

use Illuminate\Http\JsonResponse;
use Package\Adapter\Presenter\JsonPresenter;
use Package\Adapter\ViewModel\Wordbook\WordbookViewModel;
use Package\Application\Wordbook\Fetch\WordbookFetchOutput;

class WordbookFetchPresenter extends JsonPresenter {

    public function exec(WordbookFetchOutput $output)
    {
        $view_model = new WordbookViewModel($output->getWordbook());

        return $this->jsonResponse(
            [
                'status' => 'success',
                'wordbook' => $view_model,
            ]
        );
    }
}