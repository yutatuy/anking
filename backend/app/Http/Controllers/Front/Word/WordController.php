<?php

namespace App\Http\Controllers\Front\Word;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Package\Adapter\Converter\Word\WordCreateRequestConverter;
use Package\Application\Word\Create\WordCreateUsecase;
use Package\Adapter\Converter\Word\WordFetchAllRequestConverter;
use Package\Application\Word\FetchAll\WordFetchAllUsecase;
use Package\Adapter\Presenter\Word\WordFetchAllPresenter;
use Package\Adapter\Converter\Word\WordFetchRequestConverter;
use Package\Application\Word\Fetch\WordFetchUsecase;
use Package\Adapter\Presenter\Word\WordFetchPresenter;
use Package\Adapter\Converter\Word\WordUpdateRequestConverter;
use Package\Application\Word\Update\WordUpdateUsecase;
use Package\Adapter\Presenter\Word\WordUpdatePresenter;
use Package\Adapter\Converter\Word\WordDeleteRequestConverter;
use Package\Application\Word\Delete\WordDeleteUsecase;
use Package\Adapter\Presenter\Word\WordDeletePresenter;
use Package\Adapter\Converter\Word\WordFetchByWordbookIdRequestConverter;
use Package\Application\Word\FetchByWordbookId\WordFetchByWordbookIdUsecase;
use Package\Adapter\Presenter\Word\WordFetchByWordbookIdPresenter;

class WordController extends Controller
{
    public function fetch(WordFetchRequestConverter $input, WordFetchUsecase $usecase, WordFetchPresenter $presenter)
    {
        $output = $usecase->exec($input);
        return $presenter->exec($output);
    }

    public function create(
        WordCreateRequestConverter $input,
        WordCreateUsecase $usecase
    )
    {
        $usecase->exec($input);
    }

    public function update(
        WordUpdateRequestConverter $input,
        WordUpdateUsecase $usecase
    )
    {
        $usecase->exec($input);
    }

    public function delete(
        WordDeleteRequestConverter $input,
        WordDeleteUsecase $usecase
    )
    {
        $usecase->exec($input);
    }

    public function fetchByWordbookId(
        WordFetchByWordbookIdRequestConverter $input,
        WordFetchByWordbookIdUsecase $usecase,
        WordFetchByWordbookIdPresenter $presenter
    )
    {
        $output = $usecase->exec($input);
        return $presenter->exec($output);
    }
}
