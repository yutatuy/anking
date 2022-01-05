<?php

namespace Package\Adapter\Presenter\Word;

use Illuminate\Http\JsonResponse;
use Package\Adapter\Presenter\JsonPresenter;
use Package\Adapter\ViewModel\Word\WordViewModel;
use Package\Application\Word\Fetch\WordFetchOutput;

class WordFetchPresenter extends JsonPresenter {

    public function exec(WordFetchOutput $output)
    {
        $view_model = new WordViewModel($output->getWord());

        return $this->jsonResponse(
            [
                'status' => 'success',
                'word' => $view_model,
            ]
        );
    }
}