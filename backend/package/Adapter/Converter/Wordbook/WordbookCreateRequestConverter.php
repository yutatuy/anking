<?php

namespace Package\Adapter\Converter\Wordbook;

use Package\Domain\Model\Wordbook\WordbookTitle;
use Package\Domain\Model\Wordbook\WordbookIsPublic;
use Package\Domain\Model\Wordbook\WordbookUserId;
use App\Http\Requests\WordbookCreateRequest;
use Package\Application\Wordbook\Create\WordbookCreateInput;
use Illuminate\Support\Facades\Auth;

class WordbookCreateRequestConverter implements WordbookCreateInput {
  private $request;

  public function __construct(WordbookCreateRequest $input)
  {
    $this->request = $input;
  }

  public function getTitle(): WordbookTitle
  {
    return new WordbookTitle($this->request->title);
  }

  public function getUserId(): WordbookUserId
  {
    return new WordbookUserId(auth()->user()->id);
  }

  public function getIsPublic(): WordbookIsPublic
  {
    return new WordbookIsPublic($this->request->is_public);
  }
}