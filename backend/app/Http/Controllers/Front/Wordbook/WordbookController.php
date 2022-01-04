<?php

namespace App\Http\Controllers\Front\Wordbook;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Package\Adapter\Converter\Wordbook\WordbookCreateRequestConverter;
use Package\Application\Wordbook\Create\WordbookCreateUsecase;

class WordbookController extends Controller
{
    public function create(WordbookCreateRequestConverter $input, WordbookCreateUsecase $usecase)
    {
        $usecase->exec($input);
    }
}
