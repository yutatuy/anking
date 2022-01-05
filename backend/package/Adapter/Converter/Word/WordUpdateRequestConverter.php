<?php

namespace Package\Adapter\Converter\Word;

use App\Http\Requests\WordUpdateRequest;
use Package\Application\Word\Update\WordUpdateInput;
use Illuminate\Support\Facades\Auth;
use Package\Domain\Model\Word\WordId;
use Package\Domain\Model\Word\WordFrontContent;
use Package\Domain\Model\Word\WordBackContent;

class WordUpdateRequestConverter implements WordUpdateInput {
    private $request;

    public function __construct(WordUpdateRequest $input)
    {
        $this->request = $input;
    }

    public function getId(): WordId
    {
        return new WordId($this->request->id);
    }

    public function getFrontContent(): WordFrontContent
    {
        return new WordFrontContent($this->request->front_content);
    }

    public function getBackContent(): WordBackContent
    {
        return new WordBackContent($this->request->back_content);
    }
}