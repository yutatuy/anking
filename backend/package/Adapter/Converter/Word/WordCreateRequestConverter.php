<?php

namespace Package\Adapter\Converter\Word;

use App\Http\Requests\WordCreateRequest;
use Package\Application\Word\Create\WordCreateInput;
use Illuminate\Support\Facades\Auth;
use Package\Domain\Model\Word\WordWordbookId;
use Package\Domain\Model\Word\WordFrontContent;
use Package\Domain\Model\Word\WordBackContent;

class WordCreateRequestConverter implements WordCreateInput {
    private $request;

    public function __construct(WordCreateRequest $input)
    {
        $this->request = $input;
    }

    public function getWordbookId(): WordWordbookId
    {
        return new WordWordbookId($this->request->wordbook_id);
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