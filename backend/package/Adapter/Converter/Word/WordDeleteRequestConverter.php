<?php

namespace Package\Adapter\Converter\Word;

use Package\Domain\Model\Word\WordId;
use App\Http\Requests\WordDeleteRequest;
use Package\Application\Word\Delete\WordDeleteInput;

class WordDeleteRequestConverter implements WordDeleteInput {
    private $request;

    public function __construct(WordDeleteRequest $input)
    {
        $this->request = $input;
    }

    public function getId(): WordId
    {
        return new WordId($this->request->id);
    }
}