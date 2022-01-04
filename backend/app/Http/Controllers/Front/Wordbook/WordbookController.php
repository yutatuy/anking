<?php

namespace App\Http\Controllers\Front\Wordbook;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Package\Adapter\Converter\Wordbook\WordbookCreateRequestConverter;
use Package\Application\Wordbook\Create\WordbookCreateUsecase;
use Package\Adapter\Converter\Wordbook\WordbookFetchAllRequestConverter;
use Package\Application\Wordbook\FetchAll\WordbookFetchAllUsecase;
use Package\Adapter\Presenter\Wordbook\WordbookFetchAllPresenter;
use Package\Adapter\Converter\Wordbook\WordbookFetchRequestConverter;
use Package\Application\Wordbook\Fetch\WordbookFetchUsecase;
use Package\Adapter\Presenter\Wordbook\WordbookFetchPresenter;
use Package\Adapter\Converter\Wordbook\WordbookUpdateRequestConverter;
use Package\Application\Wordbook\Update\WordbookUpdateUsecase;
use Package\Adapter\Presenter\Wordbook\WordbookUpdatePresenter;

class WordbookController extends Controller
{
    public function fetch(WordbookFetchRequestConverter $input, WordbookFetchUsecase $usecase, WordbookFetchPresenter $presenter)
    {
        $output = $usecase->exec($input);
        return $presenter->exec($output);
    }

    public function fetchAll(
        WordbookFetchAllRequestConverter $input,
        WordbookFetchAllUsecase $usecase,
        WordbookFetchAllPresenter $presenter
    )
    {
        $output = $usecase->exec($input);
        return $presenter->exec($output);
    }

    public function create(
        WordbookCreateRequestConverter $input,
        WordbookCreateUsecase $usecase
    )
    {
        $usecase->exec($input);
    }

    public function update(
        WordbookUpdateRequestConverter $input,
        WordbookUpdateUsecase $usecase
    )
    {
        $usecase->exec($input);
    }
}
