<?php

namespace Package\Adapter\Converter\Wordbook;

use Package\Domain\Model\Wordbook\WordbookId;
use App\Http\Requests\WordbookDeleteRequest;
use Package\Application\Wordbook\Delete\WordbookDeleteInput;

class WordbookDeleteRequestConverter implements WordbookDeleteInput {
    private $request;

    public function __construct(WordbookDeleteRequest $input)
    {
        $this->request = $input;
    }

    public function getId(): WordbookId
    {
        return new WordbookId($this->request->id);
    }
}