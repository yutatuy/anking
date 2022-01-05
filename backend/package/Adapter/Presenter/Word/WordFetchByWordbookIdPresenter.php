<?php

namespace Package\Adapter\Presenter\Word;

use Illuminate\Http\JsonResponse;
use Package\Adapter\Presenter\JsonPresenter;
use Package\Adapter\ViewModel\Word\WordViewModel;
use Package\Application\Word\FetchByWordbookId\WordFetchByWordbookIdOutput;

class WordFetchByWordbookIdPresenter extends JsonPresenter {

    public function exec(WordFetchByWordbookIdOutput $output)
    {
        $view_model_list = [];
        foreach ($output->getData() as $value) {
            $view_model_list[] = new WordViewModel($value);
        }

        return $this->jsonResponse(
            [
                'status' => 'success',
                'words' => $view_model_list,
            ]
        );
    }
}