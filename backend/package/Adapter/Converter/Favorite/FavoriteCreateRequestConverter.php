<?php 

namespace Package\Adapter\Converter\Favorite;

use Package\Domain\Model\Wordbook\WordbookId;
use Package\Application\Favorite\Create\FavoriteCreateInput;
use App\Http\Requests\FavoriteCreateRequest;

class FavoriteCreateRequestConverter implements FavoriteCreateInput {
    private $request;

    public function __construct(FavoriteCreateRequest  $input)
    {
        $this->request = $input;
    }
    
    public function getWordbookId(): WordbookId
    {
        return new WordbookId($this->request->wordbook_id);
    }
}