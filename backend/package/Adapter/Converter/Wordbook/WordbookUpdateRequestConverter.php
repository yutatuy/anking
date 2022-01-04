<?php

namespace Package\Adapter\Converter\Wordbook;

use Package\Domain\Model\Wordbook\WordbookTitle;
use Package\Domain\Model\Wordbook\WordbookIsPublic;
use Package\Domain\Model\Wordbook\WordbookId;
use App\Http\Requests\WordbookUpdateRequest;
use Package\Application\Wordbook\Update\WordbookUpdateInput;
use Illuminate\Support\Facades\Auth;

class WordbookUpdateRequestConverter implements WordbookUpdateInput {
    private $request;

    public function __construct(WordbookUpdateRequest $input)
    {
        $this->request = $input;
    }

    public function getId(): WordbookId
    {
        return new WordbookId($this->request->id);
    }

    public function getTitle(): WordbookTitle
    {
        return new WordbookTitle($this->request->title);
    }

    public function getIsPublic(): WordbookIsPublic
    {
        return new WordbookIsPublic($this->request->is_public);
    }
}